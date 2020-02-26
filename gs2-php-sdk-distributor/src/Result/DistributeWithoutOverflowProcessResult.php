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
use Gs2\Distributor\Model\DistributeResource;

/**
 * 所持品を配布する(溢れた際の救済処置無し) のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class DistributeWithoutOverflowProcessResult implements IResult {
	/** @var DistributeResource 処理した DistributeResource */
	private $distributeResource;
	/** @var string レスポンス内容 */
	private $result;

	/**
	 * 処理した DistributeResourceを取得
	 *
	 * @return DistributeResource|null 所持品を配布する(溢れた際の救済処置無し)
	 */
	public function getDistributeResource(): ?DistributeResource {
		return $this->distributeResource;
	}

	/**
	 * 処理した DistributeResourceを設定
	 *
	 * @param DistributeResource|null $distributeResource 所持品を配布する(溢れた際の救済処置無し)
	 */
	public function setDistributeResource(?DistributeResource $distributeResource) {
		$this->distributeResource = $distributeResource;
	}

	/**
	 * レスポンス内容を取得
	 *
	 * @return string|null 所持品を配布する(溢れた際の救済処置無し)
	 */
	public function getResult(): ?string {
		return $this->result;
	}

	/**
	 * レスポンス内容を設定
	 *
	 * @param string|null $result 所持品を配布する(溢れた際の救済処置無し)
	 */
	public function setResult(?string $result) {
		$this->result = $result;
	}

    public static function fromJson(array $data): DistributeWithoutOverflowProcessResult {
        $result = new DistributeWithoutOverflowProcessResult();
        $result->setDistributeResource(isset($data["distributeResource"]) ? DistributeResource::fromJson($data["distributeResource"]) : null);
        $result->setResult(isset($data["result"]) ? $data["result"] : null);
        return $result;
    }
}