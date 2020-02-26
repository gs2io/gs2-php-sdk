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

namespace Gs2\Distributor\Result;

use Gs2\Core\Model\IResult;
use Gs2\Distributor\Model\DistributorModel;

/**
 * 配信設定を取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class GetDistributorModelResult implements IResult {
	/** @var DistributorModel 配信設定 */
	private $item;

	/**
	 * 配信設定を取得
	 *
	 * @return DistributorModel|null 配信設定を取得
	 */
	public function getItem(): ?DistributorModel {
		return $this->item;
	}

	/**
	 * 配信設定を設定
	 *
	 * @param DistributorModel|null $item 配信設定を取得
	 */
	public function setItem(?DistributorModel $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): GetDistributorModelResult {
        $result = new GetDistributorModelResult();
        $result->setItem(isset($data["item"]) ? DistributorModel::fromJson($data["item"]) : null);
        return $result;
    }
}