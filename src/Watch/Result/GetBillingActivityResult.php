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

namespace Gs2\Watch\Result;

use Gs2\Core\Model\IResult;
use Gs2\Watch\Model\BillingActivity;

/**
 * 請求にまつわるアクティビティを取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class GetBillingActivityResult implements IResult {
	/** @var BillingActivity 請求にまつわるアクティビティ */
	private $item;

	/**
	 * 請求にまつわるアクティビティを取得
	 *
	 * @return BillingActivity|null 請求にまつわるアクティビティを取得
	 */
	public function getItem(): ?BillingActivity {
		return $this->item;
	}

	/**
	 * 請求にまつわるアクティビティを設定
	 *
	 * @param BillingActivity|null $item 請求にまつわるアクティビティを取得
	 */
	public function setItem(?BillingActivity $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): GetBillingActivityResult {
        $result = new GetBillingActivityResult();
        $result->setItem(isset($data["item"]) ? BillingActivity::fromJson($data["item"]) : null);
        return $result;
    }
}