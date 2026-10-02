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

namespace Gs2\Distributor\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Distributor\Model\DistributeResource;

/**
 * Request for distributeWithoutOverflowProcess: Distribute possessions (no bailout in case of overflow)
 *
 * @see https://docs.gs2.io/api_reference/distributor/sdk/#distributewithoutoverflowprocess
 */
class DistributeWithoutOverflowProcessRequest extends Gs2BasicRequest {
    /** @var string User ID */
    private $userId;
    /** @var DistributeResource Resources to be added */
    private $distributeResource;
    /** @var string Time offset token */
    private $timeOffsetToken;
    /** @var string */
    private $duplicationAvoider;
    /** @return string|null User ID */
	public function getUserId(): ?string {
		return $this->userId;
	}
    /** @param string|null $userId User ID */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
    /**
     * @param string|null $userId User ID
     * @return DistributeWithoutOverflowProcessRequest
     */
	public function withUserId(?string $userId): DistributeWithoutOverflowProcessRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return DistributeResource|null Resources to be added */
	public function getDistributeResource(): ?DistributeResource {
		return $this->distributeResource;
	}
    /** @param DistributeResource|null $distributeResource Resources to be added */
	public function setDistributeResource(?DistributeResource $distributeResource) {
		$this->distributeResource = $distributeResource;
	}
    /**
     * @param DistributeResource|null $distributeResource Resources to be added
     * @return DistributeWithoutOverflowProcessRequest
     */
	public function withDistributeResource(?DistributeResource $distributeResource): DistributeWithoutOverflowProcessRequest {
		$this->distributeResource = $distributeResource;
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
     * @return DistributeWithoutOverflowProcessRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): DistributeWithoutOverflowProcessRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): DistributeWithoutOverflowProcessRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?DistributeWithoutOverflowProcessRequest {
        if ($data === null) {
            return null;
        }
        return (new DistributeWithoutOverflowProcessRequest())
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withDistributeResource(array_key_exists('distributeResource', $data) && $data['distributeResource'] !== null ? DistributeResource::fromJson($data['distributeResource']) : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "userId" => $this->getUserId(),
            "distributeResource" => $this->getDistributeResource() !== null ? $this->getDistributeResource()->toJson() : null,
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}