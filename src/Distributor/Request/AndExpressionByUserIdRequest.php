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
use Gs2\Distributor\Model\VerifyAction;

/**
 * Request for andExpressionByUserId: Perform multiple verification actions and determine if all are true
 *
 * @see https://docs.gs2.io/api_reference/distributor/sdk/#andexpressionbyuserid
 */
class AndExpressionByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var array List of Verify Actions */
    private $actions;
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
     * @return AndExpressionByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): AndExpressionByUserIdRequest {
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
     * @return AndExpressionByUserIdRequest
     */
	public function withUserId(?string $userId): AndExpressionByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return array|null List of Verify Actions */
	public function getActions(): ?array {
		return $this->actions;
	}
    /** @param array|null $actions List of Verify Actions */
	public function setActions(?array $actions) {
		$this->actions = $actions;
	}
    /**
     * @param array|null $actions List of Verify Actions
     * @return AndExpressionByUserIdRequest
     */
	public function withActions(?array $actions): AndExpressionByUserIdRequest {
		$this->actions = $actions;
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
     * @return AndExpressionByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): AndExpressionByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): AndExpressionByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?AndExpressionByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new AndExpressionByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withActions(!array_key_exists('actions', $data) || $data['actions'] === null ? null : array_map(
                function ($item) {
                    return VerifyAction::fromJson($item);
                },
                $data['actions']
            ))
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "actions" => $this->getActions() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getActions()
            ),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}