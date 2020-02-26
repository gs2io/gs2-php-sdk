<?php
/*
 * Copyright 2016 Game Server Services, Inc. or its affiliates. All Rights
 * Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *  http://www.apache.org/licenses/LICENSE-2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Gs2\Formation\Result;

use Gs2\Core\Model\IResult;
use Gs2\Formation\Model\Form;
use Gs2\Formation\Model\Mold;
use Gs2\Formation\Model\MoldModel;
use Gs2\Formation\Model\FormModel;

/**
 * 署名付きスロットを使ってフォームを更新 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class SetFormWithSignatureResult implements IResult {
	/** @var Form フォーム */
	private $item;
	/** @var Mold 保存したフォーム */
	private $mold;
	/** @var MoldModel フォームの保存領域 */
	private $moldModel;
	/** @var FormModel フォームモデル */
	private $formModel;

	/**
	 * フォームを取得
	 *
	 * @return Form|null 署名付きスロットを使ってフォームを更新
	 */
	public function getItem(): ?Form {
		return $this->item;
	}

	/**
	 * フォームを設定
	 *
	 * @param Form|null $item 署名付きスロットを使ってフォームを更新
	 */
	public function setItem(?Form $item) {
		$this->item = $item;
	}

	/**
	 * 保存したフォームを取得
	 *
	 * @return Mold|null 署名付きスロットを使ってフォームを更新
	 */
	public function getMold(): ?Mold {
		return $this->mold;
	}

	/**
	 * 保存したフォームを設定
	 *
	 * @param Mold|null $mold 署名付きスロットを使ってフォームを更新
	 */
	public function setMold(?Mold $mold) {
		$this->mold = $mold;
	}

	/**
	 * フォームの保存領域を取得
	 *
	 * @return MoldModel|null 署名付きスロットを使ってフォームを更新
	 */
	public function getMoldModel(): ?MoldModel {
		return $this->moldModel;
	}

	/**
	 * フォームの保存領域を設定
	 *
	 * @param MoldModel|null $moldModel 署名付きスロットを使ってフォームを更新
	 */
	public function setMoldModel(?MoldModel $moldModel) {
		$this->moldModel = $moldModel;
	}

	/**
	 * フォームモデルを取得
	 *
	 * @return FormModel|null 署名付きスロットを使ってフォームを更新
	 */
	public function getFormModel(): ?FormModel {
		return $this->formModel;
	}

	/**
	 * フォームモデルを設定
	 *
	 * @param FormModel|null $formModel 署名付きスロットを使ってフォームを更新
	 */
	public function setFormModel(?FormModel $formModel) {
		$this->formModel = $formModel;
	}

    public static function fromJson(array $data): SetFormWithSignatureResult {
        $result = new SetFormWithSignatureResult();
        $result->setItem(isset($data["item"]) ? Form::fromJson($data["item"]) : null);
        $result->setMold(isset($data["mold"]) ? Mold::fromJson($data["mold"]) : null);
        $result->setMoldModel(isset($data["moldModel"]) ? MoldModel::fromJson($data["moldModel"]) : null);
        $result->setFormModel(isset($data["formModel"]) ? FormModel::fromJson($data["formModel"]) : null);
        return $result;
    }
}