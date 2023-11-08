<?php 

global $property_query;

$fields = new koble_Fields();


?>

<!--search form-->
<div class="form-container search-form <?php echo $data['class'] ?>" id="<?php echo $data['id'] ?>">

    <form class="property-search-form" method="GET" action="<?php echo $data['action'] ?>">
        <div class="row">
            <div class="col-md-4 mb-4">
                <?php $fields->get_field('min-price', 'select'); ?>
            </div>
            <div class="col-md-4 mb-4">
                <?php $fields->get_field('property-types', 'checkbox-popup'); ?>
            </div>
            <div class="col-md-4 mb-4">
                <?php $fields->get_field('max-price', 'select'); ?>
            </div>
            
            <div class="col-md-4 mb-4">
                <?php $fields->get_field('long-term-min-price', 'select'); ?>
            </div>
            <div class="col-md-4 mb-4">
                <?php $fields->get_field('long-term-price', 'select'); ?>
            </div>
            <div class="col-md-4 mb-4">
                <?php $fields->get_field('long-term-max-price', 'select'); ?>
            </div>
            
            <div class="col-md-4 mb-4">
                <?php $fields->get_field('short-term-min-price', 'select'); ?>
            </div>
            <div class="col-md-4 mb-4">
                <?php $fields->get_field('short-term-price', 'select'); ?>
            </div>
            <div class="col-md-4 mb-4">
                <?php $fields->get_field('short-term-max-price', 'select'); ?>
            </div>
            
            <div class="col-md-4 mb-4">
                <?php $fields->get_field('min-bedrooms', 'select'); ?>
            </div>
            <div class="col-md-4 mb-4">
                <?php $fields->get_field('bedrooms', 'select'); ?>
            </div>
            <div class="col-md-4 mb-4">
                <?php $fields->get_field('max-bedrooms', 'select'); ?>
            </div>

            <div class="col-md-4 mb-4">
                <?php $fields->get_field('min-bathrooms', 'select'); ?>
            </div>
            <div class="col-md-4 mb-4">
                <?php $fields->get_field('bathrooms', 'select'); ?>
            </div>
            <div class="col-md-4 mb-4">
                <?php $fields->get_field('max-bathrooms', 'select'); ?>
            </div>

            <div class="row mx-0 collapse" id="advanced-fields" >
                
                <div class="col-md-4 mb-4">
                    <?php $fields->get_field('min-plot', 'text'); ?>
                </div>
                <div class="col-md-4 mb-4">
                    <?php $fields->get_field('plot', 'text'); ?>
                </div>
                <div class="col-md-4 mb-4">
                    <?php $fields->get_field('max-plot', 'text'); ?>
                </div>
                
                <div class="col-md-4 mb-4">
                    <?php $fields->get_field('min-built', 'text'); ?>
                </div>
                <div class="col-md-4 mb-4">
                    <?php $fields->get_field('built', 'text'); ?>
                </div>
                <div class="col-md-4 mb-4">
                    <?php $fields->get_field('max-built', 'text'); ?>
                </div>
                
                <div class="col-md-4 mb-4">
                    <?php $fields->get_field('min-terrace', 'text'); ?>
                </div>
                <div class="col-md-4 mb-4">
                    <?php $fields->get_field('terrace', 'text'); ?>
                </div>
                <div class="col-md-4 mb-4">
                    <?php $fields->get_field('max-terrace', 'text'); ?>
                </div>

                <!-- Taxonomies  -->
                <div class="col-md-4 mb-4">
                    <?php $fields->get_field('property-locations', 'checkbox-popup'); ?>
                </div>
                <div class="col-md-4 mb-4">
                    <?php $fields->get_field('property-categories', 'checkbox-dropdown'); ?>
                </div>
                <div class="col-md-4 mb-4">
                    <?php $fields->get_field('property-climate-controls', 'checkbox-dropdown'); ?>
                </div>

                <div class="col-md-4 mb-4">
                    <?php $fields->get_field('property-conditions', 'checkbox-dropdown'); ?>
                </div>            
                <div class="col-md-4 mb-4">
                    <?php $fields->get_field('property-features', 'checkbox-dropdown'); ?>
                </div>            
                <div class="col-md-4 mb-4">
                    <?php $fields->get_field('property-gardens', 'checkbox-dropdown'); ?>
                </div>
                
                <div class="col-md-4 mb-4">
                    <?php $fields->get_field('property-kitchens', 'checkbox-dropdown'); ?>
                </div>
                <div class="col-md-4 mb-4">
                    <?php $fields->get_field('property-orientations', 'checkbox-dropdown'); ?>
                </div>
                <div class="col-md-4 mb-4">
                    <?php $fields->get_field('property-parkings', 'checkbox-dropdown'); ?>
                </div>

                <div class="col-md-4 mb-4">
                    <?php $fields->get_field('property-pools', 'checkbox-dropdown'); ?>
                </div>
                <div class="col-md-4 mb-4">
                    <?php $fields->get_field('property-securities', 'checkbox-dropdown'); ?>
                </div>
                <div class="col-md-4 mb-4">
                    <?php $fields->get_field('property-settings', 'checkbox-dropdown'); ?>
                </div>
                
                
                <div class="col-md-4 mb-4">
                    <?php $fields->get_field('property-tags', 'checkbox-dropdown'); ?>
                </div> 
                <div class="col-md-4 mb-4">
                    <?php $fields->get_field('reference', 'text'); ?>
                </div>
                <div class="col-md-4 mb-4">
                    <?php $fields->get_field('property-views', 'select'); ?>
                </div>

                <div class="col-md-12 mb-4 text-center">
                    <?php $fields->get_field('own', 'checkbox'); ?>
                </div>
                <div class="col-md-12 mb-4 text-center">
                    <?php $fields->get_field('operation', 'select'); ?>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <a class="clear btn btn-secondary text-white w-100"><?php _e('Clear', 'koble') ?></a>
            </div>

            <div class="col-md-2 mb-4">
                <a class="btn btn-info text-white w-100" data-bs-toggle="modal" data-bs-target="#map-field"><?php _e('Map', 'koble') ?></a>               
            </div>
            
            <div class="col-md-2 mb-4">
                <a class="btn btn-warning text-white w-100" data-bs-toggle="collapse" data-bs-target="#advanced-fields" aria-expanded="false" aria-controls="#advanced-fields"><?php _e('Advanced', 'koble') ?></a>
            </div>
            
            <div class="col-md-4 mb-4">
                <button type="submit" class="btn btn-primary search-btn w-100">
                    <?php _e('Search', 'Divi') ?>
                </button>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="map-field" tabindex="-1" role="dialog" aria-labelledby="map-modal" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> <?php _e('Search by map', 'koble') ?> </h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body p-0">
                            <?php $fields->get_field('map'); ?>
                        </div>
                        <div class="modal-footer p-0">
                            <button type="button" class="btn btn-primary w-100 rounded-0" data-bs-dismiss="modal"><?php _e('Save'); ?></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
</div>

