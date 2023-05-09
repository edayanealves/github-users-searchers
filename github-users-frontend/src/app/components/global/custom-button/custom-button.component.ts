import {Component, Input} from '@angular/core';

@Component({
  selector: 'app-custom-button',
  templateUrl: './custom-button.component.html',
  styleUrls: ['./custom-button.component.css']
})
export class CustomButtonComponent {
  @Input()
  isLoading!: boolean

  @Input()
  disabled!: boolean

  @Input()
  text!: string

  @Input()
  class!: string

  @Input()
  type: string = 'button'

}
