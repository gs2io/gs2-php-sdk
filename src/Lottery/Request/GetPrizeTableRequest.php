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

class GetPrizeTableRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $prizeTableName;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): GetPrizeTableRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getPrizeTableName(): ?string {
		return $this->prizeTableName;
	}
	public function setPrizeTableName(?string $prizeTableName) {
		$this->prizeTableName = $prizeTableName;
	}
	public function withPrizeTableName(?string $prizeTableName): GetPrizeTableRequest {
		$this->prizeTableName = $prizeTableName;
		return $this;
	}

    public static function fromJson(?array $data): ?GetPrizeTableRequest {
        if ($data === null) {
            return null;
        }
        return (new GetPrizeTableRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withPrizeTableName(array_key_exists('prizeTableName', $data) && $data['prizeTableName'] !== null ? $data['prizeTableName'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "prizeTableName" => $this->getPrizeTableName(),
        );
    }
}