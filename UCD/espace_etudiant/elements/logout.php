<div class="bday-card">
                            <div class="bday-flex">
                                <div class="bday-img">
                                </div>
                                <div class="bday-info">
                                    <h5>
                                        <?php
                                            echo $_SESSION['nc'];
                                        ?>
                                    </h5>
                                    <small>
                                        <?php
                                            echo $_SESSION['cne'];
                                        ?>
                                    </small>
                                </div>
                            </div>
                            <div class="text-center">
                                <button>
                                     <span class="ti-lock"></span>
                                     <a href="db/logout.php" style="color: #fff;">Se deconnecter</a> 
                                </button>
                                
                            </div>

</div>