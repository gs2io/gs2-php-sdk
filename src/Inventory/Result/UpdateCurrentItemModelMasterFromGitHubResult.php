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

namespace Gs2\Inventory\Result;

use Gs2\Core\Model\IResult;
use Gs2\Inventory\Model\CurrentItemModelMaster;

/**
 * 現在有効な所持品マスターを更新します のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateCurrentItemModelMasterFromGitHubResult implements IResult {
	/** @var CurrentItemModelMaster 更新した現在有効な所持品マスター */
	private $item;

	/**
	 * 更新した現在有効な所持品マスターを取得
	 *
	 * @return CurrentItemModelMaster|null 現在有効な所持品マスターを更新します
	 */
	public function getItem(): ?CurrentItemModelMaster {
		return $this->item;
	}

	/**
	 * 更新した現在有効な所持品マスターを設定
	 *
	 * @param CurrentItemModelMaster|null $item 現在有効な所持品マスターを更新します
	 */
	public function setItem(?CurrentItemModelMaster $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): UpdateCurrentItemModelMasterFromGitHubResult {
        $result = new UpdateCurrentItemModelMasterFromGitHubResult();
        $result->setItem(isset($data["item"]) ? CurrentItemModelMaster::fromJson($data["item"]) : null);
        return $result;
    }
}