              <!-- Begin Page Content -->
              <div class="container-fluid">

                  <!-- Page Heading -->
                  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


                  <div class="row">
                      <div class="col-lg">
                          <?php if (validation_errors()) : ?>
                              <div class="alert alert-danger" role="alert">
                                  <?= validation_errors(); ?>
                              </div>
                          <?php endif; ?>

                          <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModalsub">Add New SubMenu</a>



                          <?= $this->session->flashdata('message'); ?>
                          <table class="table table-hover">
                              <thead>
                                  <tr>
                                      <th scope="col">No</th>
                                      <th scope="col">Title</th>
                                      <th scope="col">Menu</th>
                                      <th scope="col">Url</th>
                                      <th scope="col">Icon</th>
                                      <th scope="col">Active</th>
                                      <th scope="col">Action</th>

                                  </tr>
                              </thead>
                              <tbody>
                                  <?php $i = 1; ?>
                                  <?php foreach ($subMenu as $sm) : ?>
                                      <tr>
                                          <th scope="row"><?= $i; ?></th>
                                          <td><?= $sm['title']; ?></td>
                                          <td><?= $sm['menu']; ?></td>
                                          <td><?= $sm['url']; ?></td>
                                          <td><?= $sm['icon']; ?></td>
                                          <td><?= $sm['is_active']; ?></td>
                                          <td>
                                              <a href="" class="badge badge-success" data-toggle="modal" data-target="#exampleModalsubedit<?= $sm['id']; ?>">Edit</a>
                                              <a href="<?= base_url(); ?>menu/hapus/<?= $sm['id']; ?>" class="badge badge-danger" onclick="return confirm('yakin akan dihapus?');">Delete</a>







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

              <!-- Modal add-->
              <div class="modal fade" id="exampleModalsub" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelsub" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabelsub">Add New subMenu</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <form action="<?= base_url('menu/submenu'); ?>" method="post">
                              <div class="modal-body">
                                  <div class="form-group">
                                      <input type="text" class="form-control" id="title" name="title" placeholder="Submenu title">
                                  </div>
                                  <div class="form-group">
                                      <select name="menu_id" id="menu_id" class="form-control">
                                          <option value="">Select Menu</option>
                                          <?php foreach ($menu as $m) : ?>
                                              <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                                          <?php endforeach; ?>
                                      </select>
                                  </div>
                                  <div class="form-group">
                                      <input type="text" class="form-control" id="url" name="url" placeholder="Submenu url">
                                  </div>
                                  <div class="form-group">
                                      <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon">
                                  </div>
                                  <div class="form-group">
                                      <div class="form-check">
                                          <input class="form-check-input" type="checkbox" value="1" id="is_active" name="is_active" checked>
                                          <label class="form-check-label" for="is_active">
                                              Active?
                                      </div>
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


              <!--modal edit-->


              <!--modal edit-->

              <?php
                foreach ($subMenu as $sm) : ?>

                  <div class="modal fade" id="exampleModalsubedit<?= $sm['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelsubedit" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabelsubedit">Edit subMenu</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <form action="<?= base_url('menu/submenuedit/'); ?>" method="post">
                                  <div class="modal-body">
                                      <div class="form-group">
                                          <input type="text" value="<?= $sm['title'] ?>" class="form-control" id="title" name="title" placeholder="Submenu title">
                                      </div>
                                      <div class="form-group">
                                          <input type="hidden" class="form-control" id="id" name="id" readonly value="<?= $sm['id'] ?>">

                                      </div>
                                      <div class="form-group">
                                          <select name="menu_id" id="menu_id" class="form-control">
                                              <option value="<?= $sm['menu_id']; ?>"><?= $sm['menu']; ?></option>
                                              <?php foreach ($menu as $m) : ?>
                                                  <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                                              <?php endforeach; ?>
                                          </select>
                                      </div>
                                      <div class=" form-group">
                                          <input type="text" value="<?= $sm['url'] ?>" class="form-control" id="url" name="url" placeholder="Submenu url">
                                      </div>
                                      <div class="form-group">
                                          <input type="text" value="<?= $sm['icon'] ?>" class="form-control" id="icon" name="icon" placeholder="Submenu icon">
                                      </div>
                                      <div class="form-group">
                                          <div class="form-check">
                                              <input class="form-check-input" type="checkbox" value="1" id="is_active" name="is_active" checked>
                                              <label class="form-check-label" for="is_active">
                                                  Active?
                                          </div>
                                      </div>
                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <button type="submit" name="edit" class="btn btn-primary">Update</button>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
              <?php endforeach; ?>