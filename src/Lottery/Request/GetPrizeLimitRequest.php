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

namespace Gs2\Lottery\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for getPrizeLimit: Get Prize Limit
 *
 * @see https://docs.gs2.io/api_reference/lottery/sdk/#getprizelimit
 */
class GetPrizeLimitRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Prize Table name */
    private $prizeTableName;
    /** @var string Prize ID */
    private $prizeId;
    /** @return string|null Namespace name */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
    /** @param string|null $namespaceName Namespace name */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
    /**
     * @param string|null $namespaceName Namespace name
     * @return GetPrizeLimitRequest
     */
	public function withNamespaceName(?string $namespaceName): GetPrizeLimitRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Prize Table name */
	public function getPrizeTableName(): ?string {
		return $this->prizeTableName;
	}
    /** @param string|null $prizeTableName Prize Table name */
	public function setPrizeTableName(?string $prizeTableName) {
		$this->prizeTableName = $prizeTableName;
	}
    /**
     * @param string|null $prizeTableName Prize Table name
     * @return GetPrizeLimitRequest
     */
	public function withPrizeTableName(?string $prizeTableName): GetPrizeLimitRequest {
		$this->prizeTableName = $prizeTableName;
		return $this;
	}
    /** @return string|null Prize ID */
	public function getPrizeId(): ?string {
		return $this->prizeId;
	}
    /** @param string|null $prizeId Prize ID */
	public function setPrizeId(?string $prizeId) {
		$this->prizeId = $prizeId;
	}
    /**
     * @param string|null $prizeId Prize ID
     * @return GetPrizeLimitRequest
     */
	public function withPrizeId(?string $prizeId): GetPrizeLimitRequest {
		$this->prizeId = $prizeId;
		return $this;
	}

    public static function fromJson(?array $data): ?GetPrizeLimitRequest {
        if ($data === null) {
            return null;
        }
        return (new GetPrizeLimitRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withPrizeTableName(array_key_exists('prizeTableName', $data) && $data['prizeTableName'] !== null ? $data['prizeTableName'] : null)
            ->withPrizeId(array_key_exists('prizeId', $data) && $data['prizeId'] !== null ? $data['prizeId'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "prizeTableName" => $this->getPrizeTableName(),
            "prizeId" => $this->getPrizeId(),
        );
    }
}