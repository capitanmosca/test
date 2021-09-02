import { Component, OnInit } from '@angular/core';
import contacts from "../../assets/data.json";

@Component({
  selector: 'app-prueba',
  templateUrl: './prueba.component.html',
  styleUrls: ['./prueba.component.css']
})

export class PruebaComponent implements OnInit {
  Contacts: any;

  constructor() {
    this.Contacts = contacts;
    this.getEmails();
  }

  getEmails() {
    var length = this.Contacts.length;
    for (var i = 0; i < length; i++) {
      console.log(this.Contacts[i].email);
    };
  }

  ngOnInit(): void { }
}
