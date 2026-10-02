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
 * Request for resetBox: Reset Box
 *
 * @see https://docs.gs2.io/api_reference/lottery/sdk/#resetbox
 */
class ResetBoxRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Prize Table name */
    private $prizeTableName;
    /** @var string User ID */
    private $accessToken;
    /** @var string */
    private $duplicationAvoider;
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
     * @return ResetBoxRequest
     */
	public function withNamespaceName(?string $namespaceName): ResetBoxRequest {
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
     * @return ResetBoxRequest
     */
	public function withPrizeTableName(?string $prizeTableName): ResetBoxRequest {
		$this->prizeTableName = $prizeTableName;
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
     * @return ResetBoxRequest
     */
	public function withAccessToken(?string $accessToken): ResetBoxRequest {
		$this->accessToken = $accessToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): ResetBoxRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?ResetBoxRequest {
        if ($data === null) {
            return null;
        }
        return (new ResetBoxRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withPrizeTableName(array_key_exists('prizeTableName', $data) && $data['prizeTableName'] !== null ? $data['prizeTableName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "prizeTableName" => $this->getPrizeTableName(),
            "accessToken" => $this->getAccessToken(),
        );
    }
}