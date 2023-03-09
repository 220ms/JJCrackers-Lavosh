<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrdersProduct[]|\Cake\Collection\CollectionInterface $ordersProducts
 */
?>
        <div class="container mt-5 mb-5">
            <div class="d-flex justify-content-center row">
                <div class="col-md-8">
                    <div class="p-2">
                        <h4>Shopping cart</h4>
                    </div>   
            
            
                    <?php foreach ($theOrderProducts as $ordersProduct): 
                        $photo = $theProducts->where(['id',$ordersProduct->product_id])->first()->photo;
                        $name = $theProducts->where(['id',$ordersProduct->product_id])->first()->name;
                        $unit_price = $theProducts->where(['id',$ordersProduct->product_id])->first()->price;
                        ?>
                        <div class="d-flex flex-row justify-content-between align-items-center p-2 bg-white mt-4 px-3 rounded">
                            <div class="mr-1"><img class="rounded" src="https://i.imgur.com/XiFJkhI.jpg" width="70"></div>
                            <div class="d-flex flex-column align-items-center product-details"><span class="font-weight-bold"><?= 'product: '.$name ?></span></div>
                            
                            <div class="d-flex flex-row align-items-center qty">
                                <h5 class="text-grey mt-1 mr-1 ml-1"><?='$'.$unit_price ?></h5>
                            </div>
                            <div class="d-flex flex-row align-items-center qty">
                                <h5 class="text-grey mt-1 mr-1 ml-1"><?=$ordersProduct->qty ?></h5>
                            </div>
                            <div>
                                <h5 class="text-grey"><?='$'.$ordersProduct->price ?></h5>
                            </div>
                            <div class="d-flex align-items-center"><i class="fa fa-trash mb-1 text-danger"></i></div>
                        </div>
                        
                    <?php endforeach; ?>
                    <button class="btn btn-warning btn-block btn-lg ml-2 pay-button" type="button">Proceed to Pay</button>
                    <div class="d-flex flex-row align-items-center mt-3 p-2 bg-white rounded "></div>
                </div> 
            </div>
        </div>   
                    

