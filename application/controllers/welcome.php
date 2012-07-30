<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['title'] = "Welcome to Claudia’s Kids";
		$data['navlist'] = $this -> MCats -> getCategoriesNav();
		$data['mainf'] = $this->MProducts->getMainFeature();
		$skip = $data['mainf']['id'];
		$data['sidef'] = $this->MProducts->getRandomProducts(3,$skip);
		$data['main'] = 'home';
		$this -> load -> vars($data);
		$this -> load -> view('template');
	}
	
	function cat(){
		$cat = $this->MCats->getCategory($id);
		if (!count($cat)){
			redirect('welcome/index','refresh');
		}
		$data['title'] = "Claudia's Kids | ". $cat['name'];
		
		if ($cat['parentid'] < 1){
			//show other categories
			$data['listing'] = $this->MCats->getSubCategories($id);
			$data['level'] = 1;
		}else{
			//show products
			$data['listing'] = $this->MProducts->getProductsByCategory($id);
			$data['level'] = 2;
	
		}
		$data['category'] = $cat;
		$data['main'] = 'category';
		$data['navlist'] = $this->MCats->getCategoriesNav();
		$this->load->vars($data);
		$this->load->view('template');
	}
	
	function subcat(){
	}
	
	function product(){
	}
	
	function cart(){
	}
	
	function search(){
	}
	
	function about_us(){
	}
	
	function contact(){
	}
	
	function privacy(){
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */