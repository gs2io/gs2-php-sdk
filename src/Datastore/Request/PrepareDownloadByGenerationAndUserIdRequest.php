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

namespace Gs2\Datastore\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for prepareDownloadByGenerationAndUserId: Prepare data object for download by specifying user ID and generation
 *
 * @see https://docs.gs2.io/api_reference/datastore/sdk/#preparedownloadbygenerationanduserid
 */
class PrepareDownloadByGenerationAndUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var string Data object GRN */
    private $dataObjectId;
    /** @var string Data Generation */
    private $generation;
    /** @var string Time offset token */
    private $timeOffsetToken;
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
     * @return PrepareDownloadByGenerationAndUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): PrepareDownloadByGenerationAndUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
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
     * @return PrepareDownloadByGenerationAndUserIdRequest
     */
	public function withUserId(?string $userId): PrepareDownloadByGenerationAndUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Data object GRN */
	public function getDataObjectId(): ?string {
		return $this->dataObjectId;
	}
    /** @param string|null $dataObjectId Data object GRN */
	public function setDataObjectId(?string $dataObjectId) {
		$this->dataObjectId = $dataObjectId;
	}
    /**
     * @param string|null $dataObjectId Data object GRN
     * @return PrepareDownloadByGenerationAndUserIdRequest
     */
	public function withDataObjectId(?string $dataObjectId): PrepareDownloadByGenerationAndUserIdRequest {
		$this->dataObjectId = $dataObjectId;
		return $this;
	}
    /** @return string|null Data Generation */
	public function getGeneration(): ?string {
		return $this->generation;
	}
    /** @param string|null $generation Data Generation */
	public function setGeneration(?string $generation) {
		$this->generation = $generation;
	}
    /**
     * @param string|null $generation Data Generation
     * @return PrepareDownloadByGenerationAndUserIdRequest
     */
	public function withGeneration(?string $generation): PrepareDownloadByGenerationAndUserIdRequest {
		$this->generation = $generation;
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
     * @return PrepareDownloadByGenerationAndUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): PrepareDownloadByGenerationAndUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): PrepareDownloadByGenerationAndUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?PrepareDownloadByGenerationAndUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new PrepareDownloadByGenerationAndUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withDataObjectId(array_key_exists('dataObjectId', $data) && $data['dataObjectId'] !== null ? $data['dataObjectId'] : null)
            ->withGeneration(array_key_exists('generation', $data) && $data['generation'] !== null ? $data['generation'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "dataObjectId" => $this->getDataObjectId(),
            "generation" => $this->getGeneration(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}