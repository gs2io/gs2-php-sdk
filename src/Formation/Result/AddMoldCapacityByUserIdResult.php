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
use Gs2\Formation\Model\Mold;
use Gs2\Formation\Model\MoldModel;

/**
 * ユーザIDを指定して保存したフォームのキャパシティを追加 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class AddMoldCapacityByUserIdResult implements IResult {
	/** @var Mold キャパシティを更新した保存したフォーム */
	private $item;
	/** @var MoldModel フォームの保存領域 */
	private $moldModel;

	/**
	 * キャパシティを更新した保存したフォームを取得
	 *
	 * @return Mold|null ユーザIDを指定して保存したフォームのキャパシティを追加
	 */
	public function getItem(): ?Mold {
		return $this->item;
	}

	/**
	 * キャパシティを更新した保存したフォームを設定
	 *
	 * @param Mold|null $item ユーザIDを指定して保存したフォームのキャパシティを追加
	 */
	public function setItem(?Mold $item) {
		$this->item = $item;
	}

	/**
	 * フォームの保存領域を取得
	 *
	 * @return MoldModel|null ユーザIDを指定して保存したフォームのキャパシティを追加
	 */
	public function getMoldModel(): ?MoldModel {
		return $this->moldModel;
	}

	/**
	 * フォームの保存領域を設定
	 *
	 * @param MoldModel|null $moldModel ユーザIDを指定して保存したフォームのキャパシティを追加
	 */
	public function setMoldModel(?MoldModel $moldModel) {
		$this->moldModel = $moldModel;
	}

    public static function fromJson(array $data): AddMoldCapacityByUserIdResult {
        $result = new AddMoldCapacityByUserIdResult();
        $result->setItem(isset($data["item"]) ? Mold::fromJson($data["item"]) : null);
        $result->setMoldModel(isset($data["moldModel"]) ? MoldModel::fromJson($data["moldModel"]) : null);
        return $result;
    }
}