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

namespace Gs2\Dictionary\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for addEntriesByUserId: Add entries by User ID
 *
 * @see https://docs.gs2.io/api_reference/dictionary/sdk/#addentriesbyuserid
 */
class AddEntriesByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var array List of Entry Model names */
    private $entryModelNames;
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
     * @return AddEntriesByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): AddEntriesByUserIdRequest {
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
     * @return AddEntriesByUserIdRequest
     */
	public function withUserId(?string $userId): AddEntriesByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return array|null List of Entry Model names */
	public function getEntryModelNames(): ?array {
		return $this->entryModelNames;
	}
    /** @param array|null $entryModelNames List of Entry Model names */
	public function setEntryModelNames(?array $entryModelNames) {
		$this->entryModelNames = $entryModelNames;
	}
    /**
     * @param array|null $entryModelNames List of Entry Model names
     * @return AddEntriesByUserIdRequest
     */
	public function withEntryModelNames(?array $entryModelNames): AddEntriesByUserIdRequest {
		$this->entryModelNames = $entryModelNames;
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
     * @return AddEntriesByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): AddEntriesByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): AddEntriesByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?AddEntriesByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new AddEntriesByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withEntryModelNames(!array_key_exists('entryModelNames', $data) || $data['entryModelNames'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['entryModelNames']
            ))
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "entryModelNames" => $this->getEntryModelNames() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getEntryModelNames()
            ),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}