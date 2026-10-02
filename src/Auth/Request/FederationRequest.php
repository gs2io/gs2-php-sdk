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

namespace Gs2\Auth\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for federation: User ID Federation
 *
 * @see https://docs.gs2.io/api_reference/auth/sdk/#federation
 */
class FederationRequest extends Gs2BasicRequest {
    /** @var string Federation original user ID */
    private $originalUserId;
    /** @var string Federated user ID */
    private $userId;
    /** @var string Policy document */
    private $policyDocument;
    /** @var int Time offset from the current time (number of seconds relative to the current time) */
    private $timeOffset;
    /** @var string Time offset token */
    private $timeOffsetToken;
    /** @return string|null Federation original user ID */
	public function getOriginalUserId(): ?string {
		return $this->originalUserId;
	}
    /** @param string|null $originalUserId Federation original user ID */
	public function setOriginalUserId(?string $originalUserId) {
		$this->originalUserId = $originalUserId;
	}
    /**
     * @param string|null $originalUserId Federation original user ID
     * @return FederationRequest
     */
	public function withOriginalUserId(?string $originalUserId): FederationRequest {
		$this->originalUserId = $originalUserId;
		return $this;
	}
    /** @return string|null Federated user ID */
	public function getUserId(): ?string {
		return $this->userId;
	}
    /** @param string|null $userId Federated user ID */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
    /**
     * @param string|null $userId Federated user ID
     * @return FederationRequest
     */
	public function withUserId(?string $userId): FederationRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Policy document */
	public function getPolicyDocument(): ?string {
		return $this->policyDocument;
	}
    /** @param string|null $policyDocument Policy document */
	public function setPolicyDocument(?string $policyDocument) {
		$this->policyDocument = $policyDocument;
	}
    /**
     * @param string|null $policyDocument Policy document
     * @return FederationRequest
     */
	public function withPolicyDocument(?string $policyDocument): FederationRequest {
		$this->policyDocument = $policyDocument;
		return $this;
	}
    /** @return int|null Time offset from the current time (number of seconds relative to the current time) */
	public function getTimeOffset(): ?int {
		return $this->timeOffset;
	}
    /** @param int|null $timeOffset Time offset from the current time (number of seconds relative to the current time) */
	public function setTimeOffset(?int $timeOffset) {
		$this->timeOffset = $timeOffset;
	}
    /**
     * @param int|null $timeOffset Time offset from the current time (number of seconds relative to the current time)
     * @return FederationRequest
     */
	public function withTimeOffset(?int $timeOffset): FederationRequest {
		$this->timeOffset = $timeOffset;
		return $this;
	}
    /** @return string|null Time offset token */
	public function getTimeOffsetToken(): ?string {
		return $this->timeOffsetToken;
	}
    /** @param string|null $timeOffsetToken Time offset token */
	public function setTimeOffsetToken(?string $timeOffsetToken) {
		$this->timeOffsetToken = $timeOffsetToken;
	}
    /**
     * @param string|null $timeOffsetToken Time offset token
     * @return FederationRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): FederationRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

    public static function fromJson(?array $data): ?FederationRequest {
        if ($data === null) {
            return null;
        }
        return (new FederationRequest())
            ->withOriginalUserId(array_key_exists('originalUserId', $data) && $data['originalUserId'] !== null ? $data['originalUserId'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withPolicyDocument(array_key_exists('policyDocument', $data) && $data['policyDocument'] !== null ? $data['policyDocument'] : null)
            ->withTimeOffset(array_key_exists('timeOffset', $data) && $data['timeOffset'] !== null ? $data['timeOffset'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "originalUserId" => $this->getOriginalUserId(),
            "userId" => $this->getUserId(),
            "policyDocument" => $this->getPolicyDocument(),
            "timeOffset" => $this->getTimeOffset(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}