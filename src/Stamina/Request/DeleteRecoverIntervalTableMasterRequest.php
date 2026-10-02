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

namespace Gs2\Stamina\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for deleteRecoverIntervalTableMaster: Delete Recovery Interval Table Master
 *
 * @see https://docs.gs2.io/api_reference/stamina/sdk/#deleterecoverintervaltablemaster
 */
class DeleteRecoverIntervalTableMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Recovery Interval Table name */
    private $recoverIntervalTableName;
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
     * @return DeleteRecoverIntervalTableMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): DeleteRecoverIntervalTableMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Recovery Interval Table name */
	public function getRecoverIntervalTableName(): ?string {
		return $this->recoverIntervalTableName;
	}
    /** @param string|null $recoverIntervalTableName Recovery Interval Table name */
	public function setRecoverIntervalTableName(?string $recoverIntervalTableName) {
		$this->recoverIntervalTableName = $recoverIntervalTableName;
	}
    /**
     * @param string|null $recoverIntervalTableName Recovery Interval Table name
     * @return DeleteRecoverIntervalTableMasterRequest
     */
	public function withRecoverIntervalTableName(?string $recoverIntervalTableName): DeleteRecoverIntervalTableMasterRequest {
		$this->recoverIntervalTableName = $recoverIntervalTableName;
		return $this;
	}

    public static function fromJson(?array $data): ?DeleteRecoverIntervalTableMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new DeleteRecoverIntervalTableMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withRecoverIntervalTableName(array_key_exists('recoverIntervalTableName', $data) && $data['recoverIntervalTableName'] !== null ? $data['recoverIntervalTableName'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "recoverIntervalTableName" => $this->getRecoverIntervalTableName(),
        );
    }
}