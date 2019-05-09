import { Component } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { HttpHeaders } from '@angular/common/http';

@Component({
  selector: 'app-fileuploader',
  templateUrl: './fileuploader.component.html',
  styleUrls: ['./fileuploader.component.css']
})
export class FileuploaderComponent  {

  constructor(private http: HttpClient) { }


  uploadFile(event){
    let elem = event.target;
    if(elem.files.length > 0){
      
      console.log(elem.files[0]);

      this.newMethod(elem.files[0]);
    }
  }


  private newMethod(imageData: any) {

    const httpOptions = {
      headers: new HttpHeaders({
        'Content-Type':  undefined,
      })
    };

    let fd = new FormData();

    let fileReader = new FileReader();
    fileReader.onload = (e) => {

      console.log("hohoy  " + fileReader.result.toString());
      
      fd.append('file', fileReader.result.toString());

      this.http.post('http://localhost/UploadFiles-new-branch/index.php', fd)
        .subscribe((data:any) => {
          console.log('Status ' +  data.message);
        }, (error) => {
          console.error('Error! ' + error);
        });
    }
    fileReader.readAsBinaryString(imageData);



    

  }
}
