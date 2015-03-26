<div id="pet_form">

        <div id="add-pet-form">

            <form id="new_post" name="new_post" method="post" action="new_pet" class="wpcf7-form" enctype="multipart/form-data"> <!-- Form starts -->

                <p><?php _e('Add corgi information and special features in the database for future reference.', 'wp_pet'); ?></p>

                <fieldset>
                    <label for="petname"><?php _e('Name of Corgi', 'wp_pet'); ?>*</label>
                    <input type="text" id="petname" tabindex="6" name="petname" class="required" style="width:30%"/><br /><br />

                </fieldset>

                <fieldset name="pet-info">

                    <ol class="listpetinfo">

                        <li>
                            <label for="pet-gender"><?php _e('Gender', 'wp_pet'); ?>*</label>
                            <input class="required" type="radio"  tabindex="24" name="pet_gender"  value="yes" /><span class="pet_gender"><?php _e('Yes', 'wp_pet'); ?>&nbsp;&nbsp;</span>
                        	<input type="radio" tabindex="25" name="pet_gender"  value="no" /><span class="pet_gender"><?php _e('No', 'wp_pet'); ?>&nbsp;&nbsp;</span>
                                <option value=""></option>
                                <?php
                                $genders = get_terms('pet-gender', array('hide_empty' => 0));
                                foreach ($genders as $gender) {
                                    echo "<option id='pet_gender' value='$gender->slug'>$gender->name</option>";
                                }
                                ?>
                            </select>
                        </li>

                        <li>
                            <label for="pet-size"><?php _e('Corgi Size', 'wp_pet'); ?>*</label>
                            <select name="pet_size" id="pet_size" tabindex="9" >
                                <option value=""></option>
                                <?php
                                $sizes= get_terms('pet-size', array('hide_empty' => 0));
                                foreach ($sizes as $size) {
                                    echo "<option id='pet_size' value='$size->slug'>$size->name</option>";
                                }
                                ?>
                            </select>
                        </li>

                        <li>
                            <label for="pet-age"><?php _e('Age of Corgi', 'wp_pet'); ?>*</label>
                            <select name="pet_age" id="pet_age" tabindex="9" >
                                <option value=""></option>
                                <?php
                                $ages = get_terms('pet-age', array('hide_empty' => 0));
                                foreach ($ages as $age) {
                                    echo "<option id='pet_age' value='$age->slug'>$age->name</option>";
                                }
                                ?>
                            </select>
                        </li>
                    </ol>
                </fieldset>

                <fieldset>
                    <label for="pet-colors"><?php _e('Corgi Colours', 'wp_pet'); ?></label><br />
                    <ul class="list_color">
                    <?php
                    $colors = get_terms('pet-color', 'orderby=id&hide_empty=0');
                    foreach ($colors as $color) {
                        $option = '<li><input type="checkbox" name="pet_color[]" id="' . $color->slug . '" value="' . $color->slug . '">' . $color->name . '</li>';
                        echo $option;
                    }
                    ?>
                    </ul>
                </fieldset>

                <fieldset>
                    <label for="pet-pattern" class="s_label"><?php _e('Corgi Pattern', 'wp_pet'); ?></label>
                    <select name="pet_pattern" id="pet_gender" tabindex="9">
                        <option value=""></option>
                        <?php
                        $patterns = get_terms('pet-pattern', array('hide_empty' => FALSE));
                        foreach ($patterns as $pattern) {
                            echo "<option id='pet_pattern' value='$pattern->slug'>$pattern->name</option>";
                        }
                        ?>
                    </select>
                </fieldset>

                <fieldset>
                    <ol class="listpetinfo">

                        <li>
                            <label for="pet_vaccines"><?php _e('Vaccines', 'wp_pet'); ?></label>
                            <select name="pet_vaccines" id="pet_vaccines" tabindex="9">
                                <option value=""></option>
                                <option tabindex="23" name="pet_vaccines"  value="<?php _e('Vaccinated', 'wp_pet'); ?>" /><?php _e('Vaccinated', 'wp_pet'); ?></option>
                                <option tabindex="24" name="pet_vaccines"  value="<?php _e('No Vacinations', 'wp_pet'); ?>" /><?php _e('No Vacinations', 'wp_pet'); ?></option>
                                <option tabindex="25" name="pet_vaccines"  value="<?php _e('Do Not Know', 'wp_pet'); ?>" /><?php _e('Do Not Know', 'wp_pet'); ?></option>
                            </select>
                        </li>

                        <li>
                            <label for="pet-desex"><?php _e('Desexed', 'wp_pet'); ?></label>
                            <input class="required" type="radio"  tabindex="24" name="pet_desex"  value="yes" /><span class="pet_desex"><?php _e('Yes', 'wp_pet'); ?>&nbsp;&nbsp;</span>
                        	<input type="radio" tabindex="25" name="pet_desex"  value="no" /><span class="pet_desex"><?php _e('No', 'wp_pet'); ?>&nbsp;&nbsp;</span>
                                <option value=""></option>
                            </select>
                        </li>

                        <li>
                            <label for="pet-needs"><?php _e('Special needs', 'wp_pet'); ?></label>
                            <input class="required" type="radio"  tabindex="24" name="pet_needs"  value="yes" /><span class="pet_needs"><?php _e('Yes', 'wp_pet'); ?>&nbsp;&nbsp;</span>
                        	<input type="radio" tabindex="25" name="pet_needs"  value="no" /><span class="pet_needs"><?php _e('No', 'wp_pet'); ?>&nbsp;&nbsp;</span>
                                <option value=""></option>
                            </select>
                        </li>
                    </ol>
                </fieldset>

                <fieldset name="site-image" class="site-image">
                    <input type="file" name="image" class="file_input_hidden site-image file_upload" onchange="javascript: document.getElementById('fileName').value = this.value;" />
                    <br /><?php _e('300 width x 300 height at least', 'wp_pet'); ?>
                </fieldset>

              <fieldset name="submit">
                    <input type="submit" value="<?php _e('Submit pet'); ?>" tabindex="40" id="submit" name="submit" />
                </fieldset>

                <input type="hidden" name="action" value="new_post" />

    <?php wp_nonce_field('new_pet'); ?>


            </form> <!-- Form ends -->

        </div>



</div>