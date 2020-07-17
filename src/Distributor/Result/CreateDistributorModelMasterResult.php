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
use Gs2\Distributor\Model\DistributorModelMaster;

/**
 * 配信設定マスターを新規作成 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class CreateDistributorModelMasterResult implements IResult {
	/** @var DistributorModelMaster 作成した配信設定マスター */
	private $item;

	/**
	 * 作成した配信設定マスターを取得
	 *
	 * @return DistributorModelMaster|null 配信設定マスターを新規作成
	 */
	public function getItem(): ?DistributorModelMaster {
		return $this->item;
	}

	/**
	 * 作成した配信設定マスターを設定
	 *
	 * @param DistributorModelMaster|null $item 配信設定マスターを新規作成
	 */
	public function setItem(?DistributorModelMaster $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): CreateDistributorModelMasterResult {
        $result = new CreateDistributorModelMasterResult();
        $result->setItem(isset($data["item"]) ? DistributorModelMaster::fromJson($data["item"]) : null);
        return $result;
    }
}