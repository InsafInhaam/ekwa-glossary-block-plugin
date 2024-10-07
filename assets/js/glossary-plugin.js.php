<?php

$api_key = get_option('glossary_api_key');
$sheet_id = get_option('glossary_sheet_id');
$sheet_name = get_option('glossary_sheet_name');
$sheet_range = get_option('glossary_sheet_range');

// Construct the API URL using these settings
$api_url = "https://sheets.googleapis.com/v4/spreadsheets/$sheet_id/values/$sheet_name!$sheet_range?key=$api_key";

// You can now use this $api_url to make requests to the Google Sheets API.

?>

<script>
  let glossaryData = [];
  let searchTerm = "";
  let filterLetter = "";
  let loading = true;

  function fetchData() {
    setLoading(true);
    fetch('<?php echo $api_url ?>')
      .then(response => response.json())
      .then(data => {
        glossaryData = data.values.map((item, index) => ({
          id: index,
          title: item[0],
          excerpt: item[1]
        }));
        renderGlossary();
      })
      .catch(error => console.error('Error fetching glossary data:', error))
      .finally(() => setLoading(false));
  }

  function setLoading(isLoading) {
    document.getElementById("loading").style.display = isLoading ? "block" : "none";
  }

  function renderGlossary() {
    const glossaryList = document.getElementById("glossary-list");
    glossaryList.innerHTML = "";

    const filteredData = glossaryData
      .filter(item => filterLetter ? item.title.startsWith(filterLetter) : true)
      .filter(item => searchTerm ? item.title.toLowerCase().includes(searchTerm.toLowerCase()) : true)
      .sort((a, b) => a.title.localeCompare(b.title));

    if (filteredData.length === 0) {
      document.getElementById("no-results").style.display = "block";
    } else {
      document.getElementById("no-results").style.display = "none";
      filteredData.forEach(item => {
        const li = document.createElement("li");
        li.className = "GlossaryItem";
        li.innerHTML = `<h3>${item.title}</h3><div class="GlossaryItem-para"><p>${item.excerpt}</p></div>`;
        glossaryList.appendChild(li);
      });
    }
  }

  function setupAlphabetButtons() {
    const lettersContainer = document.getElementById("letters-container");
    lettersContainer.innerHTML = "";

    for (let i = 0; i < 26; i++) {
      const letter = String.fromCharCode(65 + i); // A-Z
      const button = document.createElement("button");
      button.innerHTML = letter;
      button.className = "glossary-btn";
      button.addEventListener("click", () => {
        filterLetter = letter;
        searchTerm = ""; // Clear the search term
        document.getElementById("search-input").value = "";
        renderGlossary();
      });
      lettersContainer.appendChild(button);
    }
  }

  function setupEventListeners() {
    document.getElementById("search-input").addEventListener("input", (event) => {
      searchTerm = event.target.value;
      filterLetter = ""; // Clear the letter filter when searching
      renderGlossary();
    });

    document.getElementById("print-btn").addEventListener("click", (event) => {
      event.preventDefault();
      window.print();
    });
  }

  document.addEventListener("DOMContentLoaded", () => {
    fetchData();
    setupAlphabetButtons();
    setupEventListeners();
  });

</script>