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
 * Request for describeProbabilities: List Draw Probabilities
 *
 * @see https://docs.gs2.io/api_reference/lottery/sdk/#describeprobabilities
 */
class DescribeProbabilitiesRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Lottery Model name */
    private $lotteryName;
    /** @var string User ID */
    private $accessToken;
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
     * @return DescribeProbabilitiesRequest
     */
	public function withNamespaceName(?string $namespaceName): DescribeProbabilitiesRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Lottery Model name */
	public function getLotteryName(): ?string {
		return $this->lotteryName;
	}
    /** @param string|null $lotteryName Lottery Model name */
	public function setLotteryName(?string $lotteryName) {
		$this->lotteryName = $lotteryName;
	}
    /**
     * @param string|null $lotteryName Lottery Model name
     * @return DescribeProbabilitiesRequest
     */
	public function withLotteryName(?string $lotteryName): DescribeProbabilitiesRequest {
		$this->lotteryName = $lotteryName;
		return $this;
	}
    /** @return string|null User ID */
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
    /** @param string|null $accessToken User ID */
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
    /**
     * @param string|null $accessToken User ID
     * @return DescribeProbabilitiesRequest
     */
	public function withAccessToken(?string $accessToken): DescribeProbabilitiesRequest {
		$this->accessToken = $accessToken;
		return $this;
	}

    public static function fromJson(?array $data): ?DescribeProbabilitiesRequest {
        if ($data === null) {
            return null;
        }
        return (new DescribeProbabilitiesRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withLotteryName(array_key_exists('lotteryName', $data) && $data['lotteryName'] !== null ? $data['lotteryName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "lotteryName" => $this->getLotteryName(),
            "accessToken" => $this->getAccessToken(),
        );
    }
}