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
 * スタンプシートでキャパシティサイズを加算 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class AddCapacityByStampSheetResult implements IResult {
	/** @var Mold キャパシティ加算後の保存したフォーム */
	private $item;
	/** @var MoldModel フォームの保存領域 */
	private $moldModel;

	/**
	 * キャパシティ加算後の保存したフォームを取得
	 *
	 * @return Mold|null スタンプシートでキャパシティサイズを加算
	 */
	public function getItem(): ?Mold {
		return $this->item;
	}

	/**
	 * キャパシティ加算後の保存したフォームを設定
	 *
	 * @param Mold|null $item スタンプシートでキャパシティサイズを加算
	 */
	public function setItem(?Mold $item) {
		$this->item = $item;
	}

	/**
	 * フォームの保存領域を取得
	 *
	 * @return MoldModel|null スタンプシートでキャパシティサイズを加算
	 */
	public function getMoldModel(): ?MoldModel {
		return $this->moldModel;
	}

	/**
	 * フォームの保存領域を設定
	 *
	 * @param MoldModel|null $moldModel スタンプシートでキャパシティサイズを加算
	 */
	public function setMoldModel(?MoldModel $moldModel) {
		$this->moldModel = $moldModel;
	}

    public static function fromJson(array $data): AddCapacityByStampSheetResult {
        $result = new AddCapacityByStampSheetResult();
        $result->setItem(isset($data["item"]) ? Mold::fromJson($data["item"]) : null);
        $result->setMoldModel(isset($data["moldModel"]) ? MoldModel::fromJson($data["moldModel"]) : null);
        return $result;
    }
}