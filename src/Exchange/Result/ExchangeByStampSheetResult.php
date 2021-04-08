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

namespace Gs2\Exchange\Result;

use Gs2\Core\Model\IResult;
use Gs2\Exchange\Model\RateModel;

/**
 * スタンプシートで交換を実行 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class ExchangeByStampSheetResult implements IResult {
	/** @var RateModel 交換レートモデル */
	private $item;
	/** @var string 交換処理の実行に使用するスタンプシート */
	private $stampSheet;

	/**
	 * 交換レートモデルを取得
	 *
	 * @return RateModel|null スタンプシートで交換を実行
	 */
	public function getItem(): ?RateModel {
		return $this->item;
	}

	/**
	 * 交換レートモデルを設定
	 *
	 * @param RateModel|null $item スタンプシートで交換を実行
	 */
	public function setItem(?RateModel $item) {
		$this->item = $item;
	}

	/**
	 * 交換処理の実行に使用するスタンプシートを取得
	 *
	 * @return string|null スタンプシートで交換を実行
	 */
	public function getStampSheet(): ?string {
		return $this->stampSheet;
	}

	/**
	 * 交換処理の実行に使用するスタンプシートを設定
	 *
	 * @param string|null $stampSheet スタンプシートで交換を実行
	 */
	public function setStampSheet(?string $stampSheet) {
		$this->stampSheet = $stampSheet;
	}

    public static function fromJson(array $data): ExchangeByStampSheetResult {
        $result = new ExchangeByStampSheetResult();
        $result->setItem(isset($data["item"]) ? RateModel::fromJson($data["item"]) : null);
        $result->setStampSheet(isset($data["stampSheet"]) ? $data["stampSheet"] : null);
        return $result;
    }
}