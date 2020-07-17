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
 * バージョンマスターを新規作成 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class CreateVersionModelMasterResult implements IResult {
	/** @var VersionModelMaster 作成したバージョンマスター */
	private $item;

	/**
	 * 作成したバージョンマスターを取得
	 *
	 * @return VersionModelMaster|null バージョンマスターを新規作成
	 */
	public function getItem(): ?VersionModelMaster {
		return $this->item;
	}

	/**
	 * 作成したバージョンマスターを設定
	 *
	 * @param VersionModelMaster|null $item バージョンマスターを新規作成
	 */
	public function setItem(?VersionModelMaster $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): CreateVersionModelMasterResult {
        $result = new CreateVersionModelMasterResult();
        $result->setItem(isset($data["item"]) ? VersionModelMaster::fromJson($data["item"]) : null);
        return $result;
    }
}