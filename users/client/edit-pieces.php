<div class="tab-pane fade pt-3" id="profile-pieces">

                                <div class="card" id="profile-pieces-edit">
                                    <div class="card-body row">
                                        <h5 class="card-title infos-client col-lg-12"
                                            onclick="displayElement('.justificatifs')">
                                            <i class="bi bi-file-earmark-text left"></i>Justificatifs<i
                                                class="bi right bi-dash justificatifs-bi"></i>
                                        </h5>

                                        <div class="col-lg-4 justificatifs">
                                            <div class="portfolio-wrap col-8 form-control">
                                                <img id="preview-inputImageCIN"
                                                    src="users/agency/images/<?php echo $client["cin_piece"] ?>"
                                                    class="pieces img-fluid" alt="">
                                                <div class="portfolio-links">
                                                    <a href="users/agency/images/<?php echo $client["cin_piece"] ?>"
                                                        class="portfolio-lightbox"><i class="bi bi-plus"></i></a>

                                                </div>

                                            </div>
                                            <label class="btn btn-outline-primary" for="inputImageCIN"><i
                                                    class="bi bi-file-image"></i>Changer</label>
                                            <input type="file" name="yourCIN"
                                                accept="image/x-png,image/gif,image/jpeg,image/jpg"
                                                class="form-control inputImage" id="inputImageCIN" required>
                                        </div>
                                        <div class="col-lg-4 justificatifs">
                                            <div class="portfolio-wrap col-8 form-control">
                                                <img id="preview-inputImageRib"
                                                    src="users/agency/images/<?php echo $client["rib_piece"] ?>"
                                                    class="pieces img-fluid" alt="">
                                                <div class="portfolio-links">
                                                    <a href="users/agency/images/<?php echo $client["rib_piece"] ?>"
                                                        class="portfolio-lightbox"><i class="bi bi-plus"></i></a>

                                                </div>

                                            </div>
                                            <label class="btn btn-outline-primary" for="inputImageRib"><i
                                                    class="bi bi-file-image"></i>Changer</label>
                                            <input type="file" name="yourRIB"
                                                accept="image/x-png,image/gif,image/jpeg,image/jpg"
                                                class="form-control inputImage" id="inputImageRib" required>
                                        </div>
                                        <div class="col-lg-4 justificatifs">
                                            <div class="portfolio-wrap col-8 form-control">
                                                <img id="preview-inputImageAdress"
                                                    src="users/agency/images/<?php echo $client["adress_piece"] ?>"
                                                    class="pieces img-fluid" alt="">
                                                <div class="portfolio-links">
                                                    <a href="users/agency/images/<?php echo $client["adress_piece"] ?>"
                                                        class="portfolio-lightbox"><i class="bi bi-plus"></i></a>
                                                </div>
                                            </div>
                                            <label class="btn btn-outline-primary" for="inputImageAdress"><i
                                                    class="bi bi-file-image"></i>Changer</label>

                                            <input type="file" name="yourAdress"
                                                accept="image/x-png,image/gif,image/jpeg,image/jpg"
                                                class="form-control inputImage" id="inputImageAdress" required>
                                        </div>


                                    </div>
                                    <div class="col-lg-12">
                                        <button type="submit" class="btn btn-outline-success btn-send-infos-client"
                                            name="">Sauvegarder les
                                            modifications</button>
                                    </div>
                                </div>

                            </div>