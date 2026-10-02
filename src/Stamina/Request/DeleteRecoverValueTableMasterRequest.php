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
 * Request for deleteRecoverValueTableMaster: Delete Stamina Recovery Amount Table Master
 *
 * @see https://docs.gs2.io/api_reference/stamina/sdk/#deleterecovervaluetablemaster
 */
class DeleteRecoverValueTableMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Stamina Recovery Amount Table name */
    private $recoverValueTableName;
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
     * @return DeleteRecoverValueTableMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): DeleteRecoverValueTableMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Stamina Recovery Amount Table name */
	public function getRecoverValueTableName(): ?string {
		return $this->recoverValueTableName;
	}
    /** @param string|null $recoverValueTableName Stamina Recovery Amount Table name */
	public function setRecoverValueTableName(?string $recoverValueTableName) {
		$this->recoverValueTableName = $recoverValueTableName;
	}
    /**
     * @param string|null $recoverValueTableName Stamina Recovery Amount Table name
     * @return DeleteRecoverValueTableMasterRequest
     */
	public function withRecoverValueTableName(?string $recoverValueTableName): DeleteRecoverValueTableMasterRequest {
		$this->recoverValueTableName = $recoverValueTableName;
		return $this;
	}

    public static function fromJson(?array $data): ?DeleteRecoverValueTableMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new DeleteRecoverValueTableMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withRecoverValueTableName(array_key_exists('recoverValueTableName', $data) && $data['recoverValueTableName'] !== null ? $data['recoverValueTableName'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "recoverValueTableName" => $this->getRecoverValueTableName(),
        );
    }
}