<?php

function glossary_shortcode()
{
    ob_start();

    $heading = get_option('glossary_heading');
    $paragraph = get_option('glossary_paragraph');

    ?>
    <div class="header">
        <div class="glossary-container">
            <h1 class="glossary-heading"><?php echo esc_html($heading); ?></h1>
            <p class="glossary-p">
                <?php echo wp_kses_post($paragraph); ?>
            </p>
            <div class="SearchContainer">
                <svg xmlns="http://www.w3.org/2000/svg" height="15" width="15" viewBox="0 0 512 512" class="search-icon">
                    <path fill="#5462a3"
                        d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
                </svg>
                <input type="text" id="search-input" placeholder="Search..." class="SearchInput" />
            </div>
        </div>
    </div>

    <section class="glossary">
        <div class="glossary-container">
            <div class="filter-print">
                <div id="letters-container" class="ButtonContainer"></div>
                <a href="#" id="print-btn" class="print-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" height="21" width="21" viewBox="0 0 512 512"
                        class="svg-print-icon">
                        <path fill="#5462a3"
                            d="M128 0C92.7 0 64 28.7 64 64v96h64V64H354.7L384 93.3V160h64V93.3c0-17-6.7-33.3-18.7-45.3L400 18.7C388 6.7 371.7 0 354.7 0H128zM384 352v32 64H128V384 368 352H384zm64 32h32c17.7 0 32-14.3 32-32V256c0-35.3-28.7-64-64-64H64c-35.3 0-64 28.7-64 64v96c0 17.7 14.3 32 32 32H64v64c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V384zM432 248a24 24 0 1 1 0 48 24 24 0 1 1 0-48z" />
                    </svg>

                </a>
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
