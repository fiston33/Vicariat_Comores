<?php

include_once __DIR__.'/include/header.php';

?>

        <!-- MAIN -->
        <div class="main">


            <div class="topbar">
                <h1>Settings</h1>
            </div>



            <div class="main-content">

                <div class="page-header">
                    <h1>Website Settings</h1>
                    <p>Manage website information and appearance.</p>
                </div>

                <div class="settings-container">

                    <!-- WEBSITE INFO -->

                    <div class="settings-card">

                        <h2>Website Information</h2>

                        <form>

                            <div class="form-group">
                                <label>Website Name</label>
                                <input type="text" value="Vicariat Apostolique de l'Archipel des Comores">
                            </div>

                            <div class="form-group">
                                <label>Website Description</label>
                                <textarea rows="4"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Website Logo</label>
                                <input type="file">
                            </div>

                        </form>

                    </div>

                    <!-- CONTACT INFO -->

                    <div class="settings-card">

                        <h2>Contact Information</h2>

                        <form>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email">
                            </div>

                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text">
                            </div>

                            <div class="form-group">
                                <label>Address</label>
                                <textarea rows="3"></textarea>
                            </div>

                        </form>

                    </div>

                    <!-- SOCIAL MEDIA -->

                    <div class="settings-card">

                        <h2>Social Media</h2>

                        <form>

                            <div class="form-group">
                                <label>Facebook</label>
                                <input type="url">
                            </div>

                            <div class="form-group">
                                <label>YouTube</label>
                                <input type="url">
                            </div>

                            <div class="form-group">
                                <label>Instagram</label>
                                <input type="url">
                            </div>

                            <div class="form-group">
                                <label>WhatsApp</label>
                                <input type="text">
                            </div>

                        </form>

                    </div>

                    <!-- SAVE BUTTON -->

                    <div class="settings-save">

                        <button class="save-btn">
                            Save Changes
                        </button>

                    </div>

                </div>

            </div>



        </div>

    </div>

    <?php

include_once __DIR__.'/include/footer.php';

?>

</body>

</html>