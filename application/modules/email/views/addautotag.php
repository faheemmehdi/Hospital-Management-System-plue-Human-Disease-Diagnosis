 <form role="form" name="myform" action="sms/addAutoTag" method="post" enctype="multipart/form-data">                                                                                    

                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> <?php echo lang('templatename'); ?></label>
                                                <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='' placeholder="" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> <?php echo lang('templatename'); ?></label>
                                                <select name="type">
                                                    <option value="payment">payment</option>
                                                    <option value="studentbatch">studentbatch</option>
                                                     <option value="instructor">instructor</option>
                                                     <option value="student">student</option>
                                                       <option value="taskassign">taskassign</option>
                                                </select>
                                            </div>
                                            
                                           <button type="submit" name="submit" class="btn btn-info"><?php echo lang('submit'); ?></button>
                                        </form>
            </div>
            </form>

