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
 * Request for getDataObjectHistoryByUserId: Get Data Object History by User ID
 *
 * @see https://docs.gs2.io/api_reference/datastore/sdk/#getdataobjecthistorybyuserid
 */
class GetDataObjectHistoryByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var string Data Object Name */
    private $dataObjectName;
    /** @var string Generation ID */
    private $generation;
    /** @var string Time offset token */
    private $timeOffsetToken;
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
     * @return GetDataObjectHistoryByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): GetDataObjectHistoryByUserIdRequest {
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
     * @return GetDataObjectHistoryByUserIdRequest
     */
	public function withUserId(?string $userId): GetDataObjectHistoryByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Data Object Name */
	public function getDataObjectName(): ?string {
		return $this->dataObjectName;
	}
    /** @param string|null $dataObjectName Data Object Name */
	public function setDataObjectName(?string $dataObjectName) {
		$this->dataObjectName = $dataObjectName;
	}
    /**
     * @param string|null $dataObjectName Data Object Name
     * @return GetDataObjectHistoryByUserIdRequest
     */
	public function withDataObjectName(?string $dataObjectName): GetDataObjectHistoryByUserIdRequest {
		$this->dataObjectName = $dataObjectName;
		return $this;
	}
    /** @return string|null Generation ID */
	public function getGeneration(): ?string {
		return $this->generation;
	}
    /** @param string|null $generation Generation ID */
	public function setGeneration(?string $generation) {
		$this->generation = $generation;
	}
    /**
     * @param string|null $generation Generation ID
     * @return GetDataObjectHistoryByUserIdRequest
     */
	public function withGeneration(?string $generation): GetDataObjectHistoryByUserIdRequest {
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
     * @return GetDataObjectHistoryByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): GetDataObjectHistoryByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

    public static function fromJson(?array $data): ?GetDataObjectHistoryByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new GetDataObjectHistoryByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withDataObjectName(array_key_exists('dataObjectName', $data) && $data['dataObjectName'] !== null ? $data['dataObjectName'] : null)
            ->withGeneration(array_key_exists('generation', $data) && $data['generation'] !== null ? $data['generation'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "dataObjectName" => $this->getDataObjectName(),
            "generation" => $this->getGeneration(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}