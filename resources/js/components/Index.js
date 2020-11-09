import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';

class Index extends Component{

  constructor (props) {
    super(props)
    this.state = {
      name: '',
      value1: '',
      value2: '',
      items: [],
      items2: []
    }


    this.onChangeValue = this.onChangeValue.bind(this);
    this.onSubmitButton = this.onSubmitButton.bind(this);
    this.onChangeFirstSelectValue = this.onChangeFirstSelectValue.bind(this);
    this.onChangeSecondSelectValue = this.onChangeSecondSelectValue.bind(this);
    this.onSubmitSelect1 = this.onSubmitSelect1.bind(this);
    this.onSubmitSelect2 = this.onSubmitSelect2.bind(this);

  }

    onChangeValue(e) {

        this.setState({
            [e.target.name]: e.target.value
        });
    }

    onChangeFirstSelectValue(e) {

      this.setState({

          value1: e.target.value

      });

    }

    onChangeSecondSelectValue(e) {

      this.setState({
          value2: e.target.value
      });
    }

    onSubmitSelect1(e) {

                // console.log(e.target.value);
                e.preventDefault();

        axios.post('/shift-data1', {

            value1: this.state.value1

        })
        .then(function (response) {

          console.log('This is Received Response: ');
            console.log(response.data);
              window.location.reload(false);
        })
        .catch(function (error) {
            console.log(error);
        });

        this.setState({
            value1: e.target.value1
        })

    }

    onSubmitSelect2(e) {

                // console.log(e.target.value);
                e.preventDefault();

        axios.post('/shift-data2', {

            value2: this.state.value2

        })
        .then(function (response) {

          console.log('This is Received Response: ');
            console.log(response.data);
              window.location.reload(false);
        })
        .catch(function (error) {
            console.log(error);
        });

        this.setState({
            value2: e.target.value2
        })

    }

    // onSubmitSelect1(e) {
    //   console.log('Form Submitted');
    //
    // }

    onSubmitButton(e) {

      // const data_text = $('#table1_data').attr("data-text"); //get the data attribute variable
      console.log('After submitting form, this is state: '+ this.state);
      // const x = JSON.parse(data_text);
      // console.log('This is x' + x);
        e.preventDefault();

        axios.post('/add-data', {

            name: this.state.name
        })
        .then(function (response) {

          console.log('This is Received Response: ');
            console.log(response.data);
              window.location.reload(false);
        })
        .catch(function (error) {
            console.log(error);
        });

        this.setState({
            name: ''
        })

    }


render(){

  //First Column of Data
  const data_text = $('#table1_data').attr("data-text"); //get the data attribute variable
  const x = JSON.parse(data_text);

  //Second Column of Data
  const data_text2 = $('#table2_data').attr("data-text"); //get the data attribute variable
  const y = JSON.parse(data_text2);

  // console.log('This is X: ');
  // console.log(x);
  this.state.items.push(x);
  this.state.items2.push(y);

  const {items} = this.state;
  

  const our_item = items[0];

  const our_item2 = this.state['items2'][0];

  let optionsTemplate = our_item.map((v, key) => (
      <option key={v.item} value={v.item}>{v.item}</option>
    ));

  let optionsTemplate2 = our_item2.map((v, key) => (
      <option key={v.item} value={v.item}>{v.item}</option>
    ));

  // console.log('This is X'+ x);
  return (
    <div className="container mt-16" style={{marginTop: 20}}>
        <div className="row justify-content-center">
              <div className="col-md-10">
                  <div className="card mt-16">
                      <div className="card-header">Items Management System</div>

                      <div className="card-body">
                      <div className="row">
                      <div className="col-md-5">
                      <form onSubmit={ this.onSubmitButton } >
                      <label>Item</label>
                      <input className="form-control" name="name" value={this.state.name} onChange={this.onChangeValue} type="text" placeholder="Enter Item Name & Click Add"/>
                      <br/>
                      <button className="btn btn-primary">Submit</button>
                      <br/>
                      </form>
                      </div>
                      </div>
                      <br/>
                      <div className="row mt-8">

                      <div className="col-md-5">
                      <form onSubmit={ this.onSubmitSelect1 }>
                      <select className="form-control" onChange={this.onChangeFirstSelectValue} value={this.state.value1}>
                      <option value="">Select Item</option>
                      {optionsTemplate}
                      </select>
                      <br/>
                      <button className="btn btn-dark btn-sm mr-2 float-right"> &#62; </button>
                      </form>
                      </div>
                      <br/>
                      <div className="col-md-5">
                      <form onSubmit={ this.onSubmitSelect2 }>
                      <select className="form-control" onChange={this.onChangeSecondSelectValue} value={this.state.value2}>
                      <option value="">Select Item</option>
                      {optionsTemplate2}
                      </select>
                      <br/>

                      <button className="btn btn-dark btn-sm"> &#60; </button>
                      </form>
                      </div>
                      </div>
                      </div>

                  </div>
              </div>
        </div>
    </div>
  )
}
}

export default Index;

if (document.getElementById('index')) {

    ReactDOM.render(<Index />, document.getElementById('index'));

}

// if (document.getElementById('table1_data')) {
//
// }
