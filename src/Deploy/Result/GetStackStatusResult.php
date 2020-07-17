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

namespace Gs2\Deploy\Result;

use Gs2\Core\Model\IResult;

/**
 * スタックを取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class GetStackStatusResult implements IResult {
	/** @var string None */
	private $status;

	/**
	 * Noneを取得
	 *
	 * @return string|null スタックを取得
	 */
	public function getStatus(): ?string {
		return $this->status;
	}

	/**
	 * Noneを設定
	 *
	 * @param string|null $status スタックを取得
	 */
	public function setStatus(?string $status) {
		$this->status = $status;
	}

    public static function fromJson(array $data): GetStackStatusResult {
        $result = new GetStackStatusResult();
        $result->setStatus(isset($data["status"]) ? $data["status"] : null);
        return $result;
    }
}