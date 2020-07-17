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

namespace Gs2\Version\Result;

use Gs2\Core\Model\IResult;
use Gs2\Version\Model\CurrentVersionMaster;

/**
 * 現在有効なバージョンを更新します のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateCurrentVersionMasterResult implements IResult {
	/** @var CurrentVersionMaster 更新した現在有効なバージョン */
	private $item;

	/**
	 * 更新した現在有効なバージョンを取得
	 *
	 * @return CurrentVersionMaster|null 現在有効なバージョンを更新します
	 */
	public function getItem(): ?CurrentVersionMaster {
		return $this->item;
	}

	/**
	 * 更新した現在有効なバージョンを設定
	 *
	 * @param CurrentVersionMaster|null $item 現在有効なバージョンを更新します
	 */
	public function setItem(?CurrentVersionMaster $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): UpdateCurrentVersionMasterResult {
        $result = new UpdateCurrentVersionMasterResult();
        $result->setItem(isset($data["item"]) ? CurrentVersionMaster::fromJson($data["item"]) : null);
        return $result;
    }
}