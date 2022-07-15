<style>
  tr {
  height: 60px;
  vertical-align: top;
}

.title{
  text-align: center;
}

.contact__form{
  width:95%;
  margin: 20px auto 5px auto;
}

.contact__form__row{
  height: 60px;
  vertical-align: middle;
}

.contact__form__title{
  font-weight: bold;
  text-align: left;
  vertical-align: middle;
  width: 20%;
}

.contact__form__title > span{
  color: red;
  margin-left: 10px;
}

.contact__form__half-content{
  width: 40%;
  height:100%;
}

.form__half-box{
  width: 80%;
  font-size: 16px;
  line-height:3;
}

.form__box{
  line-height:3;
  font-size: 16px;
  width: 90%;
  /* form__half-boxは苗字のセルがwidth40%だが、contact__form__half-contentでinputの右に10%分余白あるためform__boxのwidthは90%（80%+10%）として調整 */
}

.contact__form__content__sample{
  color: #c0c0c0;
}

.contact__form__content{
  width:80%;
  height:100%;
}

.form__check-box {
  width: 36px;
  height: 36px;
  vertical-align: middle;
  accent-color:black;
}

.error__message{
  color:red;
  font-weight:bold;
}


#button__2{
  margin-left: 36px;
}

.post__icon{
  margin-right: 10px;
}

.post__icon--blank{
  margin-right: 26px;
  /* post__iconの1文字16pxとmargin-right10px分をブランクで挿入 */
}

.submit__button{
  width: 15%;
  height: 60px;
  margin: 20px auto 50px auto;
}

.send__button{
  width: 100%;
  margin: 0 auto;
  background-color: black;
  color: white;
  font-weight: bold;
  cursor: pointer;
  height: 100%;
  border-radius: 5px;
  font-size: 20px;
}

.revise__button{
  width: 100%;
  margin: 0 auto;
  background-color:white;
  color: black;
  text-decoration: underline;
  cursor: pointer;
  height: 36px;
  border: none;
  font-size: 14px;
}
</style>