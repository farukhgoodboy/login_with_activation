              <!-- Begin Page Content -->
              <div class="container-fluid">

                  <!-- Page Heading -->
                  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


                  <div class="row">
                      <div class="col-lg-6">

                          <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

                          <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModalrole">Add New role</a>

                          <?= $this->session->flashdata('message'); ?>
                          <table class="table table-hover">
                              <thead>
                                  <tr>
                                      <th scope="col">No</th>
                                      <th scope="col">Role</th>
                                      <th scope="col">Active</th>

                                  </tr>
                              </thead>
                              <tbody>
                                  <?php $i = 1; ?>
                                  <?php foreach ($role as $r) : ?>
                                      <tr>
                                          <th scope="row"><?= $i; ?></th>
                                          <td><?= $r['role']; ?></td>
                                          <td>
                                              <a href="<?= base_url('admin/roleaccess/')  . $r['id']; ?>" class="badge badge-warning">Access</a>
                                              <a href="#" class="badge badge-success" data-toggle="modal" data-target="#exampleModalroleedit<?= $r['id']; ?>">Edit</a>
                                              <a href="<?= base_url(); ?>admin/hapus/<?= $r['id']; ?>" class="badge badge-danger" onclick="return confirm('yakin akan dihapus?');">Delete</a>
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
              <?php $i = 1; ?>
              <?php foreach ($role as $r) : ?>
                  <div class="modal fade" id="exampleModalrole" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelrole" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabelrole">Add New Role</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <form action="<?= base_url('admin/role') ?>" method="post">
                                  <div class="modal-body">

                                      <div class="form-group">
                                          <input type="text" class="form-control" id="role" name="role" placeholder="Role Name">
                                      </div>
                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-primary">Add</button>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>

                  <?php $i++; ?>
              <?php endforeach; ?>

              <!--modal edit-->
              <?php foreach ($role as $r) : ?>
                  <div class="modal fade" id="exampleModalroleedit<?= $r['id'] ?>">
                      <div class="modal-dialog" role="document">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title" id="newRoleModalLabel">Edit Role</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <form action="<?= base_url('admin/edit'); ?>" method="post">

                                  <input type="hidden" class="form-control" readonly value="<?= $r['id']; ?>" name="role_id">

                                  <div class="modal-body">
                                      <div class="form-group">
                                          <input type="text" class="form-control" id="role" name="role" placeholder="Role name" value="<?= $r['role'] ?>">
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