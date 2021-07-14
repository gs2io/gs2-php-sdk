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

namespace Gs2\Distributor\Result;

use Gs2\Core\Model\IResult;
use Gs2\Distributor\Model\DistributorModelMaster;

class GetDistributorModelMasterResult implements IResult {
    /** @var DistributorModelMaster */
    private $item;

	public function getItem(): ?DistributorModelMaster {
		return $this->item;
	}

	public function setItem(?DistributorModelMaster $item) {
		$this->item = $item;
	}

	public function withItem(?DistributorModelMaster $item): GetDistributorModelMasterResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?GetDistributorModelMasterResult {
        if ($data === null) {
            return null;
        }
        return (new GetDistributorModelMasterResult())
            ->withItem(empty($data['item']) ? null : DistributorModelMaster::fromJson($data['item']));
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}