<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
// use Illuminate\Support\Facades\Storage;
use App\Item;
use App\User;
use App\Auction;
use App\Favorite;
use App\Comment;
use App\Commentlike;
use App\Enditem;
use App\Largecomment;
use Image;
use Session;
use DB;
use Carbon\Carbon;

class ItemController extends Controller
{
  public function store(Request $request){
    $item_pic = $request->file('item_picture');
    $item_picture= $item_pic->getClientOriginalName();
    Image::make($item_pic)->save(public_path('/img/item/'.$item_picture));

    if($request->hasFile('item_picturefront')){
      $item_pic = $request->file('item_picturefront');
      $item_picturefront = $item_pic->getClientOriginalName();
      Image::make($item_pic)->save(public_path('/img/item/'.$item_picturefront));
    }
    else {
      $item_picturefront = null;
    }

    if($request->hasFile('item_pictureup')){
      $item_pic = $request->file('item_pictureup');
      $item_pictureup = $item_pic->getClientOriginalName();
      Image::make($item_pic)->save(public_path('/img/item/'.$item_pictureup));
    }
    else {
      $item_pictureup = null;
    }

    if($request->hasFile('item_pictureback')){
      $item_pic = $request->file('item_pictureback');
      $item_pictureback = $item_pic->getClientOriginalName();
      Image::make($item_pic)->save(public_path('/img/item/'.$item_pictureback));
    }
    else {
      $item_pictureback = null;
    }

    if($request->hasFile('item_pictureleft')){
      $item_pic = $request->file('item_pictureleft');
      $item_pictureleft = $item_pic->getClientOriginalName();
      Image::make($item_pic)->save(public_path('/img/item/'.$item_pictureleft));
    }
    else {
      $item_pictureleft = null;
    }

    if($request->hasFile('item_picturerigth')){
      $item_pic = $request->file('item_picturerigth');
      $item_picturerigth = $item_pic->getClientOriginalName();
      Image::make($item_pic)->save(public_path('/img/item/'.$item_picturerigth));
    }
    else {
      $item_picturerigth = null;
    }

    if($request->hasFile('item_picturebehind')){
      $item_pic = $request->file('item_picturebehind');
      $item_picturebehind = $item_pic->getClientOriginalName();
      Image::make($item_pic)->save(public_path('/img/item/'.$item_picturebehind));
    }
    else {
      $item_picturebehind = null;
    }

    $item = new Item([
      'item_name' => $request->input('product_name'),
      'item_maker' => $request->input('product_maker'),
      'item_buy' => $request->input('product_buy'),
      'item_category' => $request->input('product_category'),
      'item_open' => $request->input('select_state'),
      'item_deadline' => $request->input('Auction_last_time'),
      'item_startday' => date('Y-m-d'),
      'item_picture' => $item_picture,
      'item_pictureup' => $item_pictureup,
      'item_pictureback' => $item_pictureback,
      'item_pictureleft' => $item_pictureleft,
      'item_picturerigth' => $item_picturerigth,
      'item_picturebehind' => $item_picturebehind,
      'item_picturefront' => $item_picturefront,
      'postcode' => $request->input('sample4_postcode'),
      'roadAddress' => $request->input('sample4_roadAddress'),
      'jibunAddress' => $request->input('sample4_jibunAddress'),
      'Address_detail' => $request->input('sample4_doro_detail'),
      'item_info' => $request->input('item_info'),
      'item_startprice' => $request->input('Auction_start'),
      'item_success' => true,
      'success' => false,
      'seller_id' => decrypt(session()->get('login_ID'))
    ]);
    $item->save();
    return redirect('/itemcheck');
    //return view(''); 내가 올린 경매 페이지로 이동
  }

  public function sending_num(Request $request){
    $sending = $request->input('item_key');
    return view('/product-Modify',[
      'sending' => $sending
    ]);
  }

  public function product_update(Request $request){
    $uwiei= $request->input('uwiei');
    $id=session()->get('login_ID');
    $item_pic = $request->file('item_picture');
    $item_picture= $item_pic->getClientOriginalName();
    Image::make($item_pic)->save(public_path('/img/item/'.$item_picture));

    if($request->hasFile('item_picturefront')){
      $item_pic = $request->file('item_picturefront');
      $item_picturefront = $item_pic->getClientOriginalName();
      Image::make($item_pic)->save(public_path('/img/item/'.$item_picturefront));
    }
    else {
      $item_picturefront = null;
    }

    if($request->hasFile('item_pictureup')){
      $item_pic = $request->file('item_pictureup');
      $item_pictureup = $item_pic->getClientOriginalName();
      Image::make($item_pic)->save(public_path('/img/item/'.$item_pictureup));
    }
    else {
      $item_pictureup = null;
    }

    if($request->hasFile('item_pictureback')){
      $item_pic = $request->file('item_pictureback');
      $item_pictureback = $item_pic->getClientOriginalName();
      Image::make($item_pic)->save(public_path('/img/item/'.$item_pictureback));
    }
    else {
      $item_pictureback = null;
    }

    if($request->hasFile('item_pictureleft')){
      $item_pic = $request->file('item_pictureleft');
      $item_pictureleft = $item_pic->getClientOriginalName();
      Image::make($item_pic)->save(public_path('/img/item/'.$item_pictureleft));
    }
    else {
      $item_pictureleft = null;
    }

    if($request->hasFile('item_picturerigth')){
      $item_pic = $request->file('item_picturerigth');
      $item_picturerigth = $item_pic->getClientOriginalName();
      Image::make($item_pic)->save(public_path('/img/item/'.$item_picturerigth));
    }
    else {
      $item_picturerigth = null;
    }

    if($request->hasFile('item_picturebehind')){
      $item_pic = $request->file('item_picturebehind');
      $item_picturebehind = $item_pic->getClientOriginalName();
      Image::make($item_pic)->save(public_path('/img/item/'.$item_picturebehind));
    }
    else {
      $item_picturebehind = null;
    }
    $update=Item::where(['item_number'=> $uwiei])->update([
      'item_name'=> $request->input('product_name'),
      'item_maker'=> $request->input('product_maker'),
      'item_buy'=>$request->input('product_buy'),
      'item_category'=>$request->input('product_category'),
      'item_open'=>$request->input('open'),
      'item_deadline'=>$request->input('Auction_last_time'),
      'item_startprice'=>$request->input('Auction_start'),
      'item_picture'=>$item_picture,
      'item_picturefront'=>$item_picturefront,
      'item_pictureup'=>$item_pictureup,
      'item_pictureback'=>$item_pictureback,
      'item_pictureleft'=>$item_pictureleft,
      'item_picturerigth'=>$item_picturerigth,
      'item_picturebehind'=>$item_picturebehind,
      'item_info' =>$request->input('item_info')
    ]);
    return redirect('/main');
  }

  public function mainview(Request $item_number){
    $myproduct= Item::select('*')->get();
    $roAd = Item::select('roadAddress', 'item_number')->get();
    $user = User::select('*')->get();
    $collection =Item::select(['item_number'])->get();
    $count=count($collection);
    $topview = DB::table('items')->orderBy('visit_count', 'desc')->get();
    $cate=DB::table('items')->orderBy('visit_count' ,'desc')->where(['item_category'=>'남성의류'])->get();
    $catef=DB::table('items')->orderBy('visit_count' ,'desc')->where(['item_category'=>'여성의류'])->get();
    $categ=DB::table('items')->orderBy('visit_count' ,'desc')->where(['item_category'=>'패션잡화'])->get();
    $cateh=DB::table('items')->orderBy('visit_count' ,'desc')->where(['item_category'=>'뷰티미용'])->get();
    $catej=DB::table('items')->orderBy('visit_count' ,'desc')->where(['item_category'=>'모바일'])->get();
    $catek=DB::table('items')->orderBy('visit_count' ,'desc')->where(['item_category'=>'가전제품'])->get();
    $catel=DB::table('items')->orderBy('visit_count' ,'desc')->where(['item_category'=>'노트북/PC'])->get();
    return view('/main', [
      'myproduct'=>$myproduct,
      'road'=> $roAd,
      'user'=> $user,
      'count'=>$count,
      'topview'=>$topview,
      'cate'=>$cate,
      'catef'=>$catef,
      'categ'=>$categ,
      'cateh'=>$cateh,
      'catej'=>$catej,
      'catek'=>$catek,
      'catel'=>$catel

    ]);
  }
  public function infoview(Request $item_number){
    $myStat = Item::select('*')->get();
    $myproduct= Item::select('*')->get();
    $roAd = Item::select('roadAddress', 'item_number', 'item_picture')->get();
    $user = User::select('*')->get();

    return view('/mylocation', [
      'myStat' =>$myStat,
      'myproduct'=>$myproduct,
      'road'=> $roAd,
      'user'=> $user
    ]);
  }

  public function myview(Request $request){
    $id = session()->get('login_ID');
    $myStat = Item::select('item_number', 'item_name', 'item_picture', 'item_startprice', 'item_success', 'success')->where(['seller_id'=> decrypt($id)])->get();
    $Auction = Auction::join('items', 'items.item_number','=', 'auction.auction_itemnum')->select('*')->where(['buyer_ID'=>decrypt($id)])->get();

    $end = collect([]);
    $users = collect([]);
    $sp1 =collect([]);
    $sp2 =collect([]);
    $sp3 =collect([]);
    $sp4 =collect([]);
    $sp5 =collect([]);

    for($i=0; $i<count($myStat); $i++){
      $users->push(Enditem::select('*')
      ->join('items', 'items.item_number', '=', 'enditem.end_num')
      ->where(['end_num'=>$myStat[$i]->item_number])->get());
      $sp1->push(Enditem::select('item_price','buyer_ID')->join('auction', 'auction.item_price', '=', 'enditem.success_price1')->where(['end_num'=>$myStat[$i]->item_number])->get());
      $sp2->push(Enditem::select('item_price','buyer_ID')->join('auction', 'auction.item_price', '=', 'enditem.success_price2')->where(['end_num'=>$myStat[$i]->item_number])->get());
      $sp3->push(Enditem::select('item_price','buyer_ID')->join('auction', 'auction.item_price', '=', 'enditem.success_price3')->where(['end_num'=>$myStat[$i]->item_number])->get());
      $sp4->push(Enditem::select('item_price','buyer_ID')->join('auction', 'auction.item_price', '=', 'enditem.success_price4')->where(['end_num'=>$myStat[$i]->item_number])->get());
      $sp5->push(Enditem::select('item_price','buyer_ID')->join('auction', 'auction.item_price', '=', 'enditem.success_price5')->where(['end_num'=>$myStat[$i]->item_number])->get());
    }

    for($j=0; $j<count($Auction); $j++){
      $end->push(Enditem::select('*')
      ->join('items', 'items.item_number', '=', 'enditem.end_num')
      ->where(['end_num'=>$Auction[$j]->item_number])->get());
    }
    // echo $end;
    // echo $sp1.'<br>';
    // echo $sp2.'<br>';
    // echo $sp3.'<br>';
    // echo $sp4.'<br>';
    // echo $sp5.'<br>';


    return view('itemcheck', [
      'myStat' => $myStat,
      'myAuction' => $Auction,
      'end' => $end,
      'users' => $users,
      'rank1' => $sp1,
      'rank2' => $sp2,
      'rank3' => $sp3,
      'rank4' => $sp4,
      'rank5' => $sp5
      // 'maxs'=>$maxs
    ]);
  }

  public function itemview($item_number){
    $id= session()->get('login_ID');
    $myproduct= Item::select('*')->where(['item_number'=>$item_number])->get();
    $myStat = Item::select('item_number', 'item_name', 'item_picture', 'item_startprice', 'item_success','item_deadline', 'success')->where(['seller_id'=>$myproduct[0]->seller_id])->get();
    $data = User::select('user_image')->where(['id' =>  $myproduct[0]->seller_id])->get();
    $max = Auction::select('item_price')->where(['auction_itemnum'=>$item_number])->get();
    $maxs =  $max->max('item_price');
    $count = Item::select('visit_count')->where(['item_number'=>$item_number])->get();
    $like=Favorite::select('favorite_itemnum')->where(['favorite_itemnum'=>$item_number])->get()->count();
    $commentitem = Comment::select('*')->where(['comm_item'=>$item_number])->orderby('comment_num', 'desc')->get();
    // $commentitem = Comment::select(DB::raw('count(commentlike_number)'), '*')->join('commentlike', 'comment.comment_num', '=', 'commentlike.commentlike_number')->orderby('commentlike_number', 'desc')->get();
    $comm=Commentlike::select('commentlike_number')->groupBy('commentlike_number')->count();
    return $comm;
    $roAd = Item::select('roadAddress', 'item_number')->get();
    $likecomment = collect([]);
    $largcommentitem = collect([]);
    $commentlike = collect([]);
    for ($i=0; $i <count($commentitem) ; $i++) {
      $largcommentitem->push(Largecomment::select('*')->where(['largecomm_item'=>$commentitem[$i]->comment_num])->orderby('largecomment_num', 'desc')->get());
      if(!empty($id)){
        $likecomment->push(Commentlike::select('*')->where(['commentlike_name'=>decrypt($id), 'commentlike_number'=>$commentitem[$i]->comment_num])->get());
      }
      $commentlike->push (Commentlike::select('commentlike_number')->where(['commentlike_number'=>$commentitem[$i]->comment_num])->get());
    }
    if(session()->has('login_ID')){
      $likeheart = Favorite::select('*')->where(['favorite_itemnum'=>$item_number, 'favorite_name'=>decrypt($id)])->get()->count();
    }
    else {
      $likeheart = 0;
    }
    $lacount = Largecomment::select('*')->join('comment', 'largecomment.largecomm_item','=', 'comment.comment_num')->get()->count();

    Item::where(['item_number'=>$item_number])->update([
      'visit_count'=> $count[0]->visit_count + 1,
    ]);
    // echo $roAd;
    // echo count($likecomment[2]);
    // echo $lacount;
    // [코멘트 번호][같은 코멘트 번호의 댓글]
    // echo $largcommentitem.'<br>';
    return view('product-detail', [
      'lacount'=>$lacount,
      'myproduct' => $myproduct,
      'id' => encrypt($myproduct[0]->seller_id),
      'data'=>$data,
      'myStat'=>$myStat,
      'max'=>$maxs,
      'count'=>$count,
      'commentitem'=>$commentitem,
      'largcommentitem'=>$largcommentitem,
      'commentlike'=>$commentlike,
      'likecomment'=>$likecomment,
      'likeheart'=>$likeheart,
      'like'=>$like,
      'road'=>$roAd

    ]);
  }

  public function category(Request $request){
    $cat = $_GET['id'];
    // $cate=Item::select('item_number','item_name','item_picture','item_startprice','item_success')->where(['item_category'=>$cat])->get();
    $search = $request->get('search') != null ? $request->get('search') : '';
    $cate=Item::select('item_number','item_name','item_picture','item_startprice','item_success')
    ->where([
      ['item_category', $cat],
      ['item_name', 'like', '%'.$search.'%']])
      ->get();
      $cateF = count($cate);

      return view('manclothing',[
        'search'=> $request->get('search'),
        'cat' => $cat,
        'cate' => $cate,
        'cateF' => $cateF
      ]);
    }

    public function favorite_item(Request $request){
      $id= session()->get('login_ID');
      $item_num = $request->get('likejim');
      $drop_item = Favorite::select('favorite_itemnum', 'favorite_name')
      ->where(['favorite_itemnum'=>$request->get('likejim'),'favorite_name'=>decrypt($id)])
      ->get();
      if(count($drop_item)<1){
        $favorite = new Favorite([
          'favorite_itemnum'=>$request->get('likejim'),
          'favorite_name'=>decrypt($id)
        ]);
        $favorite->save();
      }
      else{
        Favorite::select('favorite_itemnum', 'favorite_name')
        ->where(['favorite_itemnum'=>$request->get('likejim'),'favorite_name'=>decrypt($id)])
        ->delete();
      }
      return redirect()->back();
    }

    public function commentlike(Request $request, $comment_num){
      // echo "sdsdsds";
      $id= session()->get('login_ID');
      $drop_item = Commentlike::select('commentlike_number', 'commentlike_name')
      ->where(['commentlike_number'=>$comment_num, 'commentlike_name'=>decrypt($id)])
      ->get();
      if(count($drop_item)<1){
        $commentlike = new Commentlike([
          'commentlike_number'=>$comment_num,
          'commentlike_name'=>decrypt($id)
        ]);
        $commentlike->save();
      }
      else{
        Commentlike::select('commentlike_number','commentlike_name')
        ->where(['commentlike_number'=>$comment_num, 'commentlike_name'=>decrypt($id)])
        ->delete();
      }
      return redirect()->back();
    }

    public function wish_itempg(Request $request){
      $id= session()->get('login_ID');
      $collection =Favorite::select(['favorite_itemnum'])->where(['favorite_name'=>decrypt($id)])->get();
      $count=count($collection);
      $wish_itm = Favorite::join('items','favorite.favorite_itemnum','=', 'items.item_number')
      ->select('*')
      // items.item_name','items.item_startprice','items.item_picture','items.item_number')
      ->where(['favorite_name'=>decrypt($id)])
      ->get();
      // echo $wish_itm;
      return view('wish_list',[
        'wish_item' =>$wish_itm,
        'count'=>$count
      ]);

    }

    public function wishitem_remove(Request $request, $favorite_itemnum, $favorite_name){
      $id = session() -> get('login_ID');
      $chack = $request->input('chk');
      Favorite::where([
        'favorite_itemnum' => $chack
        ]) -> delete();
        return redirect()->back();
      }

      public function removes($item_number, $id){

        $data = Item::where(['item_number' => $item_number, 'seller_id'=>decrypt($id)])->get();
        Item::where(['item_number' => $item_number, 'seller_id'=>decrypt($id)])->delete();
        $path = public_path('/img/item/'.$data[0]->item_picture);
        File::delete($path);
        if($data[0]->item_pictureup != null){
          $path = public_path('/img/item/'.$data[0]->item_pictureup);
          File::delete($path);
        }
        if($data[0]->item_picturefront != null){
          $path = public_path('/img/item/'.$data[0]->item_picturefront);
          File::delete($path);
        }
        if($data[0]->item_pictureback != null){
          $path = public_path('/img/item/'.$data[0]->item_pictureback);
          File::delete($path);
        }
        if($data[0]->item_pictureleft != null){
          $path = public_path('/img/item/'.$data[0]->item_pictureleft);
          File::delete($path);
        }
        if($data[0]->item_picturerigth != null){
          $path = public_path('/img/item/'.$data[0]->item_picturerigth);
          File::delete($path);
        }
        if($data[0]->item_picturebehind != null){
          $path = public_path('/img/item/'.$data[0]->item_picturebehind);
          File::delete($path);
        }

        return redirect('/itemcheck');
      }

      public function commentremove($comment_num, $comm_item){
        Largecomment::where([
          'largecomm_item'=> $comment_num
          ])->delete();

        Commentlike::where([
          'commentlike_number'=> $comment_num
          ])->delete();

        $id = session() -> get('login_ID');
        Comment::where([
          'comment_num' => $comment_num,
          'comm_item' => $comm_item,
          'comment_id'=>decrypt($id)
          ])->delete();
          return redirect()->back();
          // echo $comment_num;
          // echo $comm_item;
        }

        public function lecommentremove($largecomment_num, $largecomm_item){
          $id = session() -> get('login_ID');
          Largecomment::where([
            'largecomment_num' => $largecomment_num,
            'largecomm_item' => $largecomm_item,
            'largecomment_id' =>decrypt($id)
            ])->delete();
            return redirect()->back();
          }


          public function comment(Request $request, $item_number){
            $id = session() -> get('login_ID');
            $comment = $request->input('comment_texts');
            $newcomment = new Comment([
              'comment_id'=>decrypt($id),
              'comm_item'=>$item_number,
              'commentlike'=>0,
              'comments'=>$comment,
              'time'=>date('Y-m-d')
            ]);
            $newcomment->save();
            return redirect('/product-detail/'.$item_number);
          }

          public function recomment(Request $request, $item_number, $commentnum){
            $id = session() -> get('login_ID');
            $comment = $request->input('recomment_texts');
            Comment::where([
              'comment_id'=>decrypt($id),
              'comment_num'=>$commentnum,
              'comm_item'=>$item_number])->update([
                'comments'=>$comment,
                'time'=>date('Y-m-d')
              ]);
              return redirect('/product-detail/'.$item_number);
            }

            public function largcomment(Request $request, $item_number, $commentnum){
              // echo 'hellop';
              // return $commentnum;
              $id = session() -> get('login_ID');
              $largecomment = $request->input('lecomment_texts');
              // echo $largecomment;
              $largcomment = new Largecomment([
                'largecomments'=>$largecomment,
                'largecomm_item'=>$commentnum,
                'largecomment_id'=>decrypt($id),
                'largetime'=>date('Y-m-d')
              ]);
              $largcomment->save();
              return redirect('/product-detail/'.$item_number);
            }

            public function lecomment(Request $request, $item_number, $commentnum, $largecomment_num){
              $id = session() -> get('login_ID');
              $largecomment = $request->input('lecomment_texts');
              Largecomment::where([
                'largecomment_id'=>decrypt($id),
                'largecomment_num'=>$largecomment_num,
                'largecomm_item'=>$commentnum])->update([
                  'largecomments'=>$largecomment,
                  'largetime'=>date('Y-m-d')
                ]);
                return redirect('/product-detail/'.$item_number);
              }

              public function manageritem(Request $request){

                $item_price = DB::table('auction')->select('auction_itemnum',
                DB::raw('MAX(item_price) AS item_price'))
                ->groupBy('auction_itemnum');

                $item_joins = DB::table('items')->select('*')
                ->JoinSub($item_price,'item_price',function($join){
                  $join->on('items.item_number','=','item_price.auction_itemnum');
                })->get();
                $item_join = DB::table('items')->select('*')->get();
                $count = collect([]);
                for ($i=0; $i < count($item_join) ; $i++) {
                  $count->push(DB::table('police')->select('*')->where(['item_number2'=>$item_join[$i]->item_number])->get()->count());
                }
                // echo $count;
                return view('/manager_item',[
                  'item_join'=>$item_join,
                  'item_joins'=>$item_joins,
                  'count'=>$count
                ]);
              }
              public function police(Request $request, $item_number){
                $wan = DB::table('police')->insert([
                  'item_number2'=> $item_number,
                  'report' =>$request->input('po-ca'),
                  'reportde' =>$request->input('te')
                ]);
                return back();
              }


              public function sasa(){
                $item_number = Item::select('item_number')->where(['item_success'=> 0])->get();
                for($i = 0; $i < count($item_number); $i++){
                  $Enditem = Enditem::select('*')->where(['end_num'=>$item_number[$i]->item_number])->get();
                }
                $Endday = Enditem::select('*')->where('success_date', '<=', date('Y-m-d'))->get();
                for($j=0; $j<count($Endday); $j++){
                  if($Endday->isNotEmpty()){
                    if(!Empty($Endday[$j])){
                      if($Endday[$j]->success_user1 != null){
                        if( date('Y-m-d') >= date("Y-m-d",strtotime($Endday[$j]->success_date."+2 day" ))) {
                          // echo $j,
                          // $Endday[$j]->success_date.'<br>';
                          Enditem::where([['success_date', '<=', $Endday[$j]->success_date],['end_num','=',$Endday[$j]->end_num]])->update([
                            'success_user1' => null,
                            'buyer'=> $Endday[$j]->success_user2,
                            'success_date' => date("Y-m-d",strtotime($Endday[$j]->success_date."+2 day" ))
                          ]);
                          // echo "->1".'<br>';
                          if($Endday[$j]->success_user2 == null
                          && $Endday[$j]->success_user3 == null
                          && $Endday[$j]->success_user4 == null
                          && $Endday[$j]->success_user5 == null) {
                            Item::where(['item_number' =>$Endday[$j]->end_num])->update([
                              'success' => 0
                            ]);
                          }
                        }
                      }
                      elseif($Endday[$j]->success_user1 == null && $Endday[$j]->success_user2 != null){
                        Enditem::where([['success_date', '<=', $Endday[$j]->success_date],['end_num','=',$Endday[$j]->end_num]])->update([
                          'success_user2' => null,
                          'buyer'=> $Endday[$j]->success_user3,
                          'success_date' => date("Y-m-d",strtotime($Endday[$j]->success_date."+2 day" ))
                        ]);
                        if($Endday[$j]->success_user3 == null
                        && $Endday[$j]->success_user4 == null
                        && $Endday[$j]->success_user5 == null) {
                          Item::where(['item_number' =>$Endday[$j]->end_num])->update([
                            'success' => 0
                          ]);
                        }
                      }
                      elseif($Endday[$j]->success_user2 == null && $Endday[$j]->success_user3 != null){
                        Enditem::where([['success_date', '<=', $Endday[$j]->success_date],['end_num','=',$Endday[$j]->end_num]])->update([
                          'success_user3' => null,
                          'buyer'=> $Endday[$j]->success_user4,
                          'success_date' => date("Y-m-d",strtotime($Endday[$j]->success_date."+2 day" ))
                        ]);
                        if($Endday[$j]->success_user4 == null
                        && $Endday[$j]->success_user5 == null) {
                          Item::where(['item_number' =>$Endday[$j]->end_num])->update([
                            'success' => 0
                          ]);
                        }
                      }
                      elseif($Endday[$j]->success_user3 == null && $Endday[$j]->success_user4 != null){
                        Enditem::where([['success_date', '<=', $Endday[$j]->success_date],['end_num','=',$Endday[$j]->end_num]])->update([
                          'success_user4' => null,
                          'buyer'=> $Endday[$j]->success_user5,
                          'success_date' => date("Y-m-d",strtotime($Endday[$j]->success_date."+2 day" ))
                        ]);
                        if($Endday[$j]->success_user5 == null) {
                          Item::where(['item_number' =>$Endday[$j]->end_num])->update([
                            'success' => 0
                          ]);
                        }
                      }
                      elseif($Endday[$j]->success_user4 == null && $Endday[$j]->success_user5 != null){
                        Enditem::where([['success_date', '<=', $Endday[$j]->success_date],['end_num','=',$Endday[$j]->end_num]])->update([
                          'success_user5' => null,
                          'buyer'=> null,
                          'success_date' => date("Y-m-d",strtotime($Endday[$j]->success_date."+2 day" ))
                        ]);
                        // if($Endday[$j]->end_num )
                        Item::where(['item_number' =>  $Endday[$j]->end_num])->update([
                          'success' => 0
                        ]);
                      }
                      elseif ($Endday[$j]->success_user1 == null
                      && $Endday[$j]->success_user2 == null
                      && $Endday[$j]->success_user3 == null
                      && $Endday[$j]->success_user4 == null
                      && $Endday[$j]->success_user5 == null) {
                        Item::where(['item_number' =>$Endday[$j]->end_num])->update([
                          'success' => 0
                        ]);
                      }
                    }
                  }
                }
              }
              public function managerdelete(Request $request){
                $it =$request->input();
                Item::where(['item_number'=>$it])->update([
                  'item_success' => 0
                ]);
                return back();

              }
            }
