



  <div>
            <h2>Client ID: <?php echo $client_id; ?></h2>
            <p>Full Name: <?php echo $client_name; ?></p>
            <p>Client contact: <?php echo $clientcontact; ?></p>
            <p>Profession: <?php echo $profession; ?></p>
            <p>Technician ID: <?php echo $technicianid; ?></p>
            <p>Technician contact: <?php echo $techcontact; ?></p>
            <p>Technician Fullname: <?php echo $techfullname; ?></p>



        </div>


        <div class="form-group" style="margin: left 50px;">
                                                <label for="fname">Full Name *</label>
                                                <input type="text" class="form-control" name="fname" id="fname" onkeydown="return alphaOnly(event);" value="<?=$client_name?>"/>
                                            </div>
                                            <input type="text"
                                                value="<?=$client_id?>"
                                                name="client_id"
                                                hidden>
                                            <div class="form-group">
                                                <label for="email">Your Contact info *</label>
                                                <input type="email" class="form-control" name="email" id="email" value="<?=$clientcontact?>"/>

                                                <!-- <input type="text" class="form-control" name="desc" id="desc" value="<?=$desc?>" /> -->