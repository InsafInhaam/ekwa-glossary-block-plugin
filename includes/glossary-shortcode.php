<?php

function glossary_shortcode()
{
    ob_start();
    ?>
    <div class="header">
        <div class="glossary-container">
            <h1 class="glossary-heading">Dermatology Glossary of Terms</h1>
            <p class="glossary-p">
                Common Dermatology Terms and Phrases
                <br />
                Enter a keyword or select a letter to browse the glossary.
            </p>
            <div class="SearchContainer">
                <input type="text" id="search-input" placeholder="Search..." class="SearchInput" />
            </div>
        </div>
    </div>

    <section class="glossary">
        <div class="glossary-container">
            <div class="filter-print">
                <div id="letters-container" class="ButtonContainer"></div>
                <a href="#" id="print-btn" class="print-btn">Print</a>
            </div>
            <div id="loading" class="loading" style="display: none;">
                <div>Loading...</div>
            </div>
            <div id="no-results" class="no-results" style="display: none;">No results found</div>
            <ul id="glossary-list" class="GlossaryList"></ul>
        </div>
    </section>
    <?php
    return ob_get_clean();
}

add_shortcode('glossary_of_terms', 'glossary_shortcode');
