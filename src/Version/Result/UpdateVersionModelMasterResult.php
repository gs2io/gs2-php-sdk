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
use Gs2\Version\Model\VersionModelMaster;

/**
 * バージョンマスターを更新 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateVersionModelMasterResult implements IResult {
	/** @var VersionModelMaster 更新したバージョンマスター */
	private $item;

	/**
	 * 更新したバージョンマスターを取得
	 *
	 * @return VersionModelMaster|null バージョンマスターを更新
	 */
	public function getItem(): ?VersionModelMaster {
		return $this->item;
	}

	/**
	 * 更新したバージョンマスターを設定
	 *
	 * @param VersionModelMaster|null $item バージョンマスターを更新
	 */
	public function setItem(?VersionModelMaster $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): UpdateVersionModelMasterResult {
        $result = new UpdateVersionModelMasterResult();
        $result->setItem(isset($data["item"]) ? VersionModelMaster::fromJson($data["item"]) : null);
        return $result;
    }
}