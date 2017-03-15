/**
 * Created by pablo on 15/03/2017.
 */

function limpiar(text){
    var text;
    text = text.replace(/[áàäâå]/, 'a');
    text = text.replace(/[éèëê]/, 'e');
    text = text.replace(/[íìïî]/, 'i');
    text = text.replace(/[óòöô]/, 'o');
    text = text.replace(/[úùüû]/, 'u');
    text = text.replace(/[ýÿ]/, 'y');
    text = text.replace(/[ñ]/, 'n');
    text = text.replace(/[ç]/, 'c');
    text = text.replace(/['"]/, '');
    text = text.replace(/[^a-zA-Z0-9-]/, '');
    text = text.replace(/\s+/, '-');
    text = text.replace(/' '/, '-');
    text = text.replace(/(_)$/, '');
    text = text.replace(/^(_)/, '');
    $("nomCat").attr("href", text);
}