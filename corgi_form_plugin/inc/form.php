<div id="corgi_form">

        <div id="add-corgi-form">

            <form id="new_post" name="new_post" method="post" action="new_corgi" class="wpcf7-form" enctype="multipart/form-data"> 
            
            <!-- This is where the form starts. This page sets up the form that is displayed in the front end when the shortcode is used -->
			<!-- This is customizes the types of information that will be used for the Corgi Information  -->

                <p><?php _e('Add corgi information and special features in the database for future reference.', 'wp_corgi'); ?></p>

                <fieldset>
                    <label for="corginame"><?php _e('Name of Corgi', 'wp_corgi'); ?>*</label>
                    <input type="text" id="corginame" tabindex="6" name="corginame" class="required" style="width:30%"/><br /><br />

                </fieldset>

                <fieldset name="corgi-info">

                    <ol class="listcorgiinfo">
					
					<!-- This is sets up the individual form information and how it will appear on the front end. This is repeated for each taxonomy, however each taxonomy have different functions -->

                        <li>
                            <label for="corgi-gender"><?php _e('Gender', 'wp_corgi'); ?>*</label>
                            <input class="required" type="radio"  tabindex="24" name="corgi_gender"  value="female" /><span class="corgi_gender"><?php _e('Female', 'wp_corgi'); ?>&nbsp;&nbsp;</span>
                        	<input type="radio" tabindex="25" name="corgi_gender"  value="male" /><span class="corgi_gender"><?php _e('Male', 'wp_corgi'); ?>&nbsp;&nbsp;</span>
                                <option value=""></option>
                                <?php
                                $genders = get_terms('corgi-gender', array('hide_empty' => 0));
                                foreach ($genders as $gender) {
                                    echo "<option id='corgi_gender' value='$gender->slug'>$gender->name</option>";
                                }
                                ?>
                            </select>
                        </li>

                        <li>
                            <label for="corgi-size"><?php _e('Corgi Size', 'wp_corgi'); ?>*</label>
                            <select name="corgi_size" id="corgi_size" tabindex="9" >
                                <option value=""></option>
                                <?php
                                $sizes= get_terms('corgi-size', array('hide_empty' => 0));
                                foreach ($sizes as $size) {
                                    echo "<option id='corgi_size' value='$size->slug'>$size->name</option>";
                                }
                                ?>
                            </select>
                        </li>

                        <li>
                            <label for="corgi-age"><?php _e('Age of Corgi', 'wp_corgi'); ?>*</label>
                            <select name="corgi_age" id="corgi_age" tabindex="9" >
                                <option value=""></option>
                                <?php
                                $ages = get_terms('corgi-age', array('hide_empty' => 0));
                                foreach ($ages as $age) {
                                    echo "<option id='corgi_age' value='$age->slug'>$age->name</option>";
                                }
                                ?>
                            </select>
                        </li>
                    </ol>
                </fieldset>

                <fieldset>
                    <label for="corgi-colors"><?php _e('Corgi Colours', 'wp_corgi'); ?></label><br />
                    <ul class="list_color">
                    <?php
                    $colors = get_terms('corgi-color', 'orderby=id&hide_empty=0');
                    foreach ($colors as $color) {
                        $option = '<li><input type="checkbox" name="corgi_color[]" id="' . $color->slug . '" value="' . $color->slug . '">' . $color->name . '</li>';
                        echo $option;
                    }
                    ?>
                    </ul>
                </fieldset>

                <fieldset>
                    <label for="corgi-pattern" class="s_label"><?php _e('Corgi Pattern', 'wp_corgi'); ?></label>
                    <select name="corgi_pattern" id="corgi_gender" tabindex="9">
                        <option value=""></option>
                        <?php
                        $patterns = get_terms('corgi-pattern', array('hide_empty' => FALSE));
                        foreach ($patterns as $pattern) {
                            echo "<option id='corgi_pattern' value='$pattern->slug'>$pattern->name</option>";
                        }
                        ?>
                    </select>
                </fieldset>

                <fieldset>
                    <ol class="listcorgiinfo">

                        <li>
                            <label for="corgi_vaccines"><?php _e('Vaccines', 'wp_corgi'); ?></label>
                            <select name="corgi_vaccines" id="corgi_vaccines" tabindex="9">
                                <option value=""></option>
                                <option tabindex="23" name="corgi_vaccines"  value="<?php _e('Vaccinated', 'wp_corgi'); ?>" /><?php _e('Vaccinated', 'wp_corgi'); ?></option>
                                <option tabindex="24" name="corgi_vaccines"  value="<?php _e('No Vacinations', 'wp_corgi'); ?>" /><?php _e('No Vacinations', 'wp_corgi'); ?></option>
                                <option tabindex="25" name="corgi_vaccines"  value="<?php _e('Do Not Know', 'wp_corgi'); ?>" /><?php _e('Do Not Know', 'wp_corgi'); ?></option>
                            </select>
                        </li>

                        <li>
                            <label for="corgi-desex"><?php _e('Desexed', 'wp_corgi'); ?></label>
                            <input class="required" type="radio"  tabindex="24" name="corgi_desex"  value="yes" /><span class="corgi_desex"><?php _e('Yes', 'wp_corgi'); ?>&nbsp;&nbsp;</span>
                        	<input type="radio" tabindex="25" name="corgi_desex"  value="no" /><span class="corgi_desex"><?php _e('No', 'wp_corgi'); ?>&nbsp;&nbsp;</span>
                                <option value=""></option>
                            </select>
                        </li>

                        <li>
                            <label for="corgi-needs"><?php _e('Special needs', 'wp_corgi'); ?></label>
                            <input class="required" type="radio"  tabindex="24" name="corgi_needs"  value="yes" /><span class="corgi_needs"><?php _e('Yes', 'wp_corgi'); ?>&nbsp;&nbsp;</span>
                        	<input type="radio" tabindex="25" name="corgi_needs"  value="no" /><span class="corgi_needs"><?php _e('No', 'wp_corgi'); ?>&nbsp;&nbsp;</span>
                                <option value=""></option>
                            </select>
                        </li>
                    </ol>
                </fieldset>

                <fieldset name="site-image" class="site-image">
                    <input type="file" name="image" class="file_input_hidden site-image file_upload" onchange="javascript: document.getElementById('fileName').value = this.value;" />
                    <br /><?php _e('300 width x 300 height at least', 'wp_corgi'); ?>
                </fieldset>

              <fieldset name="submit">
                    <input type="submit" value="<?php _e('Submit corgi'); ?>" tabindex="40" id="submit" name="submit" />
                </fieldset>

                <input type="hidden" name="action" value="new_post" />

    <?php wp_nonce_field('new_corgi'); ?>


            </form> 
            <!-- This is where the form ends -->

        </div>



</div>