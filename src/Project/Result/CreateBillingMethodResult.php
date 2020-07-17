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

namespace Gs2\Project\Result;

use Gs2\Core\Model\IResult;
use Gs2\Project\Model\BillingMethod;

/**
 * 支払い方法を新規作成 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class CreateBillingMethodResult implements IResult {
	/** @var BillingMethod 作成した支払い方法 */
	private $item;

	/**
	 * 作成した支払い方法を取得
	 *
	 * @return BillingMethod|null 支払い方法を新規作成
	 */
	public function getItem(): ?BillingMethod {
		return $this->item;
	}

	/**
	 * 作成した支払い方法を設定
	 *
	 * @param BillingMethod|null $item 支払い方法を新規作成
	 */
	public function setItem(?BillingMethod $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): CreateBillingMethodResult {
        $result = new CreateBillingMethodResult();
        $result->setItem(isset($data["item"]) ? BillingMethod::fromJson($data["item"]) : null);
        return $result;
    }
}