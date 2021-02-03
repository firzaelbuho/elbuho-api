<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Soal extends RestController
{

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        // load model

        $this->load->model('model_soal');
    }

   

    public function index_insert(){

    }

    public function index_get()
    {
    
        $category = $this->get('category');     

        if ($category === null) {

            // get all soal
            $soal = $this->model_soal->get_all();

            // Check if the users data store contains users
            if ($soal) {
                // Set the response and exit
                $this->response($soal, 200);             
            } else {
                // Set the response and exit
                
            }
        } else {

            // get soal by category

            $soal = $this->model_soal->get_by_cat($category);

            if ($soal) {
                $this->response($soal, 200);
                
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'soal tidak ditemukan'
                ], 404);
            }
        }
    }

    public function index_post(){
        $data = [
            'question' => $this->post('question'),
            'opta' => $this->post('opta'),
            'optb' => $this->post('optb'),
            'optc' => $this->post('optc'),
            'optd' => $this->post('optd'),
            'opte' => $this->post('opte'),
            'answer' => $this->post('answer'),
            'cat' => $this->post('cat')
        ];
        if($this->model_soal->insert($data) > 0){
            // OK
            $this->response([
                'status' => true,
                'message' => 'soal berhasil ditambahkan'
            ], 201);
        } else {
            $this->response([
                'status' => false,
                'message' => "soal gagal ditambahkan"
            ], 403);
        }

    }

    public function index_put(){ 
        $id = $this->put('id');
        if($id === null){

            $this->response([
                'status' => false,
                'message' => 'bad request'
            ], 400);

        } else {
            $data = [
            'question' => $this->put('question'),
            'opta' => $this->put('opta'),
            'optb' => $this->put('optb'),
            'optc' => $this->put('optc'),
            'optd' => $this->put('optd'),
            'opte' => $this->put('opte'),
            'answer' => $this->put('answer'),
            'cat' => $this->put('cat')
        ];
        if($this->model_soal->update($data, $id) > 0){
            // OK
            $this->response([
                'status' => true,
                'message' => 'soal berhasil ubah'
            ], 201);
        } else {
            $this->response([
                'status' => false,
                'message' => "soal tidak ditemukan"
            ], 404);
        }
        }

    }
    

    public function index_delete(){
        $id = $this->delete('id');

            // Check if the id not given
            if ($id === null) {
                // Set the response and exit
                $this->response([
                    'status' => false,
                    'message' => "bad request, masukkan id terlebih dahulu"
                ], 400);             
            } else {

                if($this->model_soal->delete($id) > 0){
                      // OK
            
                    $this->response([
                        'status' => true,
                        'message' => 'soal berhasil dihapus'
                    ], 204);
                } else {
                    $this->response([
                        'status' => false,
                        'message' => "soal tidak ditemukan"
                    ], 404);
                }              
        }
    }
    
}
