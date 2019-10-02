              <!-- Begin Page Content -->
              <div class="container-fluid">

                  <!-- Page Heading -->
                  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


                  <div class="row">
                      <div class="col-lg-8">

                          <?= form_open_multipart('menu/edit_menu'); ?>



                          <div class="form-group row justify-content-end">
                              <div class="col-sm-10">
                                  <button type="submit" class="btn btn-primary">Update</button>
                              </div>
                          </div>
                          </form>


                      </div>
                  </div>


              </div>
              <!-- /.container-fluid -->

              </div>
              <!-- End of Main Content -->

              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Add New Menu</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <form action="<?= base_url('menu'); ?>" method="post">
                              <div class="modal-body">
                                  <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu Name">

                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary">Add</button>
                              </div>
                          </form>

                      </div>
                  </div>
              </div>