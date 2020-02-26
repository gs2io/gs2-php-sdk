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

namespace Gs2\Money\Result;

use Gs2\Core\Model\IResult;
use Gs2\Money\Model\Wallet;

/**
 * スタンプシートを使用してウォレットに残高を加算します のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class DepositByStampSheetResult implements IResult {
	/** @var Wallet 加算後のウォレット */
	private $item;

	/**
	 * 加算後のウォレットを取得
	 *
	 * @return Wallet|null スタンプシートを使用してウォレットに残高を加算します
	 */
	public function getItem(): ?Wallet {
		return $this->item;
	}

	/**
	 * 加算後のウォレットを設定
	 *
	 * @param Wallet|null $item スタンプシートを使用してウォレットに残高を加算します
	 */
	public function setItem(?Wallet $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): DepositByStampSheetResult {
        $result = new DepositByStampSheetResult();
        $result->setItem(isset($data["item"]) ? Wallet::fromJson($data["item"]) : null);
        return $result;
    }
}