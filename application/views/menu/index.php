              <!-- Begin Page Content -->
              <div class="container-fluid">

                  <!-- Page Heading -->
                  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


                  <div class="row">
                      <div class="col-lg-6">

                          <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

                          <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">Add New Menu</a>

                          <?= $this->session->flashdata('message'); ?>
                          <table class="table table-hover">
                              <thead>
                                  <tr>
                                      <th scope="col">No</th>
                                      <th scope="col">Menu</th>
                                      <th scope="col">Active</th>

                                  </tr>
                              </thead>
                              <tbody>
                                  <?php $i = 1; ?>
                                  <?php foreach ($menu as $m) : ?>
                                      <tr>
                                          <th scope="row"><?= $i; ?></th>
                                          <td><?= $m['menu']; ?></td>
                                          <td>
                                              <a href="#" class="badge badge-success" data-toggle="modal" data-popup="tooltip" data-placement="top" title="edit" data-target="#exampleModalmenuedit<?= $m['id']; ?>">Edit</a>
                                              <a href="<?= base_url(); ?>menu/hapusmenu/<?= $m['id']; ?>" class="badge badge-danger" onclick="return confirm('yakin akan dihapus?');">Delete</a>
                                          </td>
                                      </tr>
                                      <?php $i++; ?>
                                  <?php endforeach; ?>
                              </tbody>
                          </table>


                      </div>
                  </div>






              </div>
              <!-- /.container-fluid -->

              </div>
              <!-- End of Main Content -->
              <!--MODAL ADD-->

              <!-- Modal -->
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

              < <!--modal edit-->

                  <?php foreach ($menu as $m) : ?>
                      <div class="modal fade" id="exampleModalmenuedit<?= $m['id'] ?>">
                          <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="newRoleModalLabel">Edit Menu</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <form action="<?= base_url('menu/editmenu'); ?>" method="post">

                                      <input type="hidden" class="form-control" readonly value="<?= $m['id']; ?>" name="menu_id">

                                      <div class="modal-body">
                                          <div class="form-group">
                                              <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu name" value="<?= $m['menu'] ?>">
                                          </div>
                                      </div>
                                      <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-pencil-alt fa-sm"></i> Edit</button>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </div>
                  <?php endforeach; ?>