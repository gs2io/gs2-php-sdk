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
use Gs2\Money\Model\Receipt;

/**
 * レシートを記録 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class RecordReceiptResult implements IResult {
	/** @var Receipt レシート */
	private $item;

	/**
	 * レシートを取得
	 *
	 * @return Receipt|null レシートを記録
	 */
	public function getItem(): ?Receipt {
		return $this->item;
	}

	/**
	 * レシートを設定
	 *
	 * @param Receipt|null $item レシートを記録
	 */
	public function setItem(?Receipt $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): RecordReceiptResult {
        $result = new RecordReceiptResult();
        $result->setItem(isset($data["item"]) ? Receipt::fromJson($data["item"]) : null);
        return $result;
    }
}